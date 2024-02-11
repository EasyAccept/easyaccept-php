<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;

class EasyNamedArgument extends EasyArgument
{
    /**
     * @param string $name Name of the argument
     * @param ?string $value Value of the argument
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private string $name,
        private ?string $value = null
    )
    {
        if (empty($name)) {
            throw new EasyAcceptException("Argument name cannot be null or empty.");
        }
    }
}