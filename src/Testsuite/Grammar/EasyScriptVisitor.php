<?php declare(strict_types=1);

namespace EasyAccept\Testsuite\Grammar;

use EasyAccept\Testsuite\Command\EchoCommand;
use EasyAccept\Testsuite\Command\QuitCommand;
use EasyAccept\Testsuite\Exception\CommandException;
use EasyAccept\Testsuite\Exception\SyntaxException;
use EasyAccept\Testsuite\Grammar\EasyScript\Context\ArgumentListContext;
use EasyAccept\Testsuite\Grammar\EasyScript\Context\Echo_Context;
use EasyAccept\Testsuite\Grammar\EasyScript\Context\Quit_Context;
use EasyAccept\Testsuite\Grammar\EasyScript\Context\UnknownCommandContext;
use EasyAccept\Testsuite\Grammar\EasyScript\EasyScriptBaseVisitor;
use EasyAccept\Testsuite\Interpreter\EasyArgument;
use EasyAccept\Testsuite\Interpreter\EasyInstruction;
use EasyAccept\Testsuite\Interpreter\EasyNamedArgument;
use EasyAccept\Testsuite\Util\ReflectedCallback;

class EasyScriptVisitor extends EasyScriptBaseVisitor
{
    /**
     * @var array<CommandException> List of errors that occurred during the execution of the tests
     */
    private array $errors = [];

    /**
     * @param string $provider   Provider to be called by the visitor to execute unknown commands
     */
    public function __construct(
        private string $provider,
    ) { }

    #[\Override]
    public function visitEcho_(Echo_Context $context)
    {
        $arguments = array_reverse($this->_parseArguments($context->argumentList() ?? []));
        $instruction = new EasyInstruction('echo', $arguments);

        $echoCommand = new EchoCommand($instruction, $this->provider);

        try {
            $echoCommand->execute();
        } catch (CommandException $e) {
            $this->_addError($e);  // Add error to the list of errors and continue
        }
    }

    #[\Override]
    public function visitQuit_(Quit_Context $context)
    {
        $instruction = new EasyInstruction('quit', []);

        $quitCommand = new QuitCommand($instruction, $this->provider);

        try {
            $quitCommand->execute();
        } catch (CommandException $e) {
            $this->_addError($e);  // Add error to the list of errors and continue
        }
    }

    #[\Override]
    public function visitUnknownCommand(UnknownCommandContext $context)
    {
        $command = $context->WORD()->getText();
        $arguments = array_reverse($this->_parseArguments($context->argumentList()));
        $instruction = new EasyInstruction($command, $arguments);

        $this->_callProvider($instruction);
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

    private function _addError(CommandException $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * Create the list of arguments from the argument list context
     * 
     * @param ?ArgumentListContext $arglcv Argument list context
     * @return array<EasyInstruction> List of arguments
     */
    private function _parseArguments(?ArgumentListContext $arglcv, array $arguments = []): array
    {
        // If argument list context is null, return the current arguments
        if ($arglcv == NULL) {
            return $arguments;
        }

        // Call the next argument list recursively
        $arglcnext = $arglcv->argumentList();
        if ($arglcnext != NULL) {
            $arguments = $this->_parseArguments($arglcnext, $arguments);
        }

        // Get the current argument
        $argcv = $arglcv->argument();

        // Check if there is an argument (if not, throw an exception because it is unexpected end of input)
        if ($argcv == NULL) {
            throw new SyntaxException("Unexpected end of input.", 1);
        }

        // Get the text of the argument
        $argv = $argcv->getText();

        // Create the EasyArgument or EasyNamedArgument object from the argument text
        $argument = explode('=', $argv, 2);
        $parsedArgument = (count($argument) == 1) ? 
            new EasyArgument($argument[0]) : 
            new EasyNamedArgument($argument[0], $argument[1]);

        // Add the argument object to the list of arguments
        array_push($arguments, $parsedArgument);

        return $arguments;
    }

    private function _callProvider(EasyInstruction $instruction): void
    {
        $command = $instruction->command();
        $arguments = $instruction->argumentsAsArray();

        $rp = new \ReflectionClass($this->provider);
        $instance = $rp->newInstance();

        try {
            $rc = new ReflectedCallback([$instance, $command]);
            $rc->invokeArgs($arguments);
        } catch (\ReflectionException $e) {
            $this->_addError(new CommandException($e->getMessage()));
        }
    }
}