<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Command;

use EasyAccept\Testsuite\Attribute\AsCommand;
use EasyAccept\Testsuite\Exception\QuitException;

#[AsCommand("quit")]
class QuitCommand extends Command
{
    #[\Override]
    public function execute(): void
    {
        throw new QuitException();
    }
}
