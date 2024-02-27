<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;

class EasyInstruction
{
    /**
     * @param string $command                  Command to be executed
     * @param array<EasyArgument> $arguments   Arguments to be passed to the command
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private string $command,
        private array $arguments,
    ) {}

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