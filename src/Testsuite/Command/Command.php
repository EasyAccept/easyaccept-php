<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Command;

use EasyAccept\Testsuite\Attribute\AsCommand;
use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Interpreter\EasyInstruction;

abstract class Command implements ICommand
{
    public static function getDefaultCommand(): ?string
    {
        if ($attribute = (new \ReflectionClass(static::class))->getAttributes(AsCommand::class)) {
            return $attribute[0]->newInstance()->command;
        }

        return null;
    }

    /**
     * @param EasyInstruction $instruction
     * @param string $provider
     * @param string $command
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private EasyInstruction $instruction,
        private string $provider,
        private ?string $command = null
    ) {
        if (!class_exists($provider)) {
            throw new EasyAcceptException("Provider {$provider} cannot be reached.");
        }

        $this->command = $command ?? static::getDefaultCommand();

        if (empty($this->command)) {
            throw new EasyAcceptException("Command command cannot be empty.");
        }
    }

    #[\Override]
    public function command(): string {
        return $this->command;
    }

    #[\Override]
    public function provider(): string {
        return $this->provider;
    }

    protected function instruction(): EasyInstruction {
        return $this->instruction;
    }
}
