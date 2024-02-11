<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;

class EasyArgument
{
    /**
     * @param string $value Value of the argument
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private ?string $name = null,
        private ?string $value = null
    )
    {
        if ( (is_null($name) || empty($name)) && (is_null($value) || empty($value)) ) {
            throw new EasyAcceptException("Argument value cannot be null or empty.");
        }

        // Only use a single data
        if (!is_null($value) && !empty($value)) {
            $this->name = $this->value;
        }

        // Force name and value to the save data
        $this->value = $this->name;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}