<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Command;

interface ICommand
{
    /**
     * @return string The command name recognized by the interpreter. 
     */
    public function command(): string;

    /**
     * @return string The provider class name.
     */
    public function provider(): string;

    /**
     * Execute the command.
     * @throws \EasyAccept\Testsuite\Exception\CommandException
     */
    public function execute(): void;
}