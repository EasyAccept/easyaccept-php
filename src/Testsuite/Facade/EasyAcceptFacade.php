<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Facade;

use EasyAccept\Testsuite\Command\EchoCommand;
use EasyAccept\Testsuite\Command\QuitCommand;
use EasyAccept\Testsuite\Exception\CommandException;
use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Exception\QuitException;
use EasyAccept\Testsuite\Interpreter\EasyFile;
use EasyAccept\Testsuite\Interpreter\EasyInstruction;
use EasyAccept\Testsuite\Util\ReflectedCallback;
use Symfony\Component\Console\Style\SymfonyStyle;

class EasyAcceptFacade
{
    /**
     * @var array<\EasyAccept\Testsuite\Command\ICommand> List of internal commands
     */
    private array $internalCommands = [
        EchoCommand::class,
        QuitCommand::class
    ];

    /**
     * @var array<\EasyAccept\Testsuite\Exception\CommandException> List of errors that occurred during the execution of the tests
     */
    private array $errors = [];

    /**
     * @param array<string> $tests List of tests to be run
     * @param \Symfony\Component\Console\Style\SymfonyStyle $io SymfonyStyle Instance to interact with the console
     */
    public function __construct(
        private string $provider,
        private array $tests,
        private SymfonyStyle $io
    ) { }

    /**
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     * @return void
     */
    public function runTests(): void
    {
        // Check if provider can be reached
        if (!class_exists($this->provider)) {
            throw new EasyAcceptException("Provider {$this->provider} cannot be reached.");
        }

        // Check if the tests exists
        foreach ($this->tests as $test) {
            if (!file_exists($test)) {
                throw new EasyAcceptException("Test file $test does not exist");
            }

            $interpreter = new EasyFile($test);

            foreach ($interpreter->instructions() as $instruction) {
                foreach ($this->internalCommands as $internalCommand) {
                    /** @var \EasyAccept\Testsuite\Command\ICommand */
                    $internalCommandInstance = (new $internalCommand($instruction, $this->provider));
                    if ($internalCommandInstance->command() == $instruction->command()) {
                        try {
                            $internalCommandInstance->execute();
                        } catch (QuitException $e) {
                            $this->io->text("Command quit executed. Exiting...");
                            return;
                        } catch (CommandException $e) {
                            $this->addError($e);  // Add error to the list of errors and continue
                        }
                        continue 2;
                    }
                }
                $this->callProvider($instruction);
            }
        }
    }

    /**
     * @return array<\EasyAccept\Testsuite\Exception\CommandException>
     */
    public function errors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    private function addError(CommandException $error): void
    {
        $this->errors[] = $error;
    }

    private function callProvider(EasyInstruction $instruction): void
    {
        $command = $instruction->command();
        $arguments = $instruction->argumentsAsArray();

        $rp = new \ReflectionClass($this->provider);
        $instance = $rp->newInstance();

        try {
            $rc = new ReflectedCallback([$instance, $command]);
            $rc->invokeArgs($arguments);
        } catch (\ReflectionException $e) {
            $this->addError(new CommandException($e->getMessage()));
        }
    }
}
