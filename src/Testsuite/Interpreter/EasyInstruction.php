<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;

class EasyInstruction
{
    /**
     * @var string $command Command to be executed
     */
    private string $command;

    /**
     * @var array<\EasyAccept\Testsuite\Interpreter\EasyArgument> $arguments Arguments to be passed to the command
     */
    private array $arguments;

    /**
     * @param string $instruction Instruction to be interpreted
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private string $instruction
    ) {
        if (empty($instruction)) {
            throw new EasyAcceptException("Instruction cannot be empty");
        }
        $this->parseInstruction();
    }

    private function parseInstruction(): void
    {
        $instruction = explode(' ', $this->instruction);
        $this->command = array_shift($instruction);
        $this->arguments = $this->parseArguments($instruction);
    }

    private function parseArguments(array $arguments): array
    {
        $parsedArguments = [];
        foreach ($arguments as $argument) {
            $argument = explode('=', $argument, 2);
            $parsedArguments[] = (count($argument) == 1) ? 
                new EasyArgument($argument[0]) : 
                new EasyNamedArgument($argument[0], $argument[1]);
        }
        return $parsedArguments;
    }

    public function command(): string
    {
        return $this->command;
    }

    /**
     * @return array<EasyArgument>
     */
    public function arguments(): array
    {
        return $this->arguments;
    }

    /**
     * Return arguments as key-value pairs
     * 
     * @return array
     */
    public function argumentsAsArray(): array
    {
        $arguments = [];
        foreach ($this->arguments as $argument) {
            if ($argument instanceof EasyNamedArgument) {
                $arguments[$argument->name()] = $argument->value();
            } else {
                $arguments[] = $argument->value();
            }
        }
        return $arguments;
    }
}