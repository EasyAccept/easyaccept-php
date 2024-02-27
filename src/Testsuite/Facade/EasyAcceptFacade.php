<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Facade;

use Antlr\Antlr4\Runtime\Error\Listeners\ConsoleErrorListener;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use EasyAccept\Testsuite\Exception\QuitException;
use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Grammar\EasyScript\EasyScriptLexer;
use EasyAccept\Testsuite\Grammar\EasyScript\EasyScriptParser;
use EasyAccept\Testsuite\Grammar\EasyScriptVisitor;
use Symfony\Component\Console\Style\SymfonyStyle;

class EasyAcceptFacade
{
    /**
     * @var array<CommandException> List of errors that occurred during the execution of the tests
     */
    private array $errors = [];

    /**
     * @param string        $provider   Provider to be called by the visitor to execute unknown commands
     * @param array<string> $tests      List of tests to be run
     * @param SymfonyStyle  $io         SymfonyStyle Instance to interact with the console
     */
    public function __construct(
        private string $provider,
        private array $tests,
        private SymfonyStyle $io
    ) { }

    /**
     * @throws EasyAcceptException
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

            // Construct the Grammar
            $input = InputStream::fromPath($test);
            $lexer = new EasyScriptLexer($input);
            $tokens = new CommonTokenStream($lexer);
            $parser = new EasyScriptParser($tokens);
            $parser->addErrorListener(new ConsoleErrorListener());
            $parser->setBuildParseTree(true);

            // Check for syntax errors
            $tree = $parser->easy();
            if ($parser->getNumberOfSyntaxErrors() > 0) {
                throw new EasyAcceptException("Syntax errors found in $test");
            }

            // Execute the tests
            try {
                $easyScriptVisitor = new EasyScriptVisitor($this->provider);
                $easyScriptVisitor->visit($tree);
            } catch (QuitException $e) {
                $this->io->text("Command quit executed. Exiting...");
                return;
            }

            // Register errors
            $this->errors = $easyScriptVisitor->errors();
        }
    }

    /**
     * @return array<CommandException>
     */
    public function errors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }
}
