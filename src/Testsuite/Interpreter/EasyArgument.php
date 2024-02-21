<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Exception\SyntaxException;

class EasyArgument
{
    /**
     * The name of the argument can be the only provided data. In this case, the 
     * value will be the same as the name.
     * 
     * @param string $name Name of the argument
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

        // Only use a single data if only one is provided
        if ( ($this->_is_provided($this->name) && !$this->_is_provided($this->value)) || 
             ($this->_is_provided($this->value) && !$this->_is_provided($this->name)) ) {
            $data = $this->_is_provided($this->name) ? $this->name : $this->value;
            $data = $this->_prepare_value($data);
            $this->name = $data;
            $this->value = $data;
        }
        // Or use both data if both are provided
        else {
            $this->name = $this->_prepare_name($this->name);
            $this->value = $this->_prepare_value($this->value);
        }
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function value(): ?string
    {
        return $this->value;
    }

    private function _is_provided(?string $data): bool
    {
        return !is_null($data) && !empty($data);
    }

    /**
     * Prepare name converting it to lowercase and replacing spaces with underscores.
     * 
     * @param string $name Name to be prepared
     * @return string
     */
    private function _prepare_name(string $name): string
    {
        return str_replace(" ", "_", strtolower($name));
    }

    /**
     * Prepare value removing double or single quotes from start and end of the string.
     * 
     * @param string $value Value to be prepared
     * @return string
     */
    private function _prepare_value(string $value): string
    {
        if ( (substr($value, 0, 1) === '"' && substr($value, -1) === "'") || 
             (substr($value, 0, 1) === "'" && substr($value, -1) === '"') ) {
            throw new SyntaxException("Argument value cannot start with a double quote and end with a single quote or vice-versa.");
        }

        if ( (substr($value, 0, 1) === '"' && substr($value, -1) === '"') || 
             (substr($value, 0, 1) === "'" && substr($value, -1) === "'") ) {
            $value = substr($value, 1, -1);
        }

        return $value;
    }
}