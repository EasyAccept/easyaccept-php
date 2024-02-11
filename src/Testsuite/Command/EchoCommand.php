<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Command;

use EasyAccept\Testsuite\Attribute\AsCommand;
use EasyAccept\Testsuite\Interpreter\EasyArgument;

#[AsCommand("echo")]
class EchoCommand extends Command
{
    #[\Override]
    public function execute(): void
    {
        echo implode(' ', array_reduce($this->instruction()->arguments(), fn(array $acc, EasyArgument $argv) => [...$acc, $argv->value()], [])) . PHP_EOL;
    }
}
