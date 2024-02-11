<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Interpreter;

use EasyAccept\Testsuite\Exception\EasyAcceptException;

class EasyFile
{
    /**
     * @var array<\EasyAccept\Testsuite\Interpreter\EasyInstruction> $instructions List of instructions to be executed
     */
    private array $instructions = [];

    /**
     * @param string $file File to be interpreted
     * @throws \EasyAccept\Testsuite\Exception\EasyAcceptException
     */
    public function __construct(
        private string $file
    ) {
        if (!file_exists($file)) {
            throw new EasyAcceptException("File $file does not exist");
        }
        $this->parseFile();
    }

    private function parseFile(): void
    {
        $file = file_get_contents($this->file);
        $instructions = explode(PHP_EOL, $file);
        foreach ($instructions as $instruction) {
            if (empty($instruction)) {
                continue;
            }
            $this->instructions[] = new EasyInstruction($instruction);
        }
    }


    /**
     * @return array<EasyInstruction>
     */
    public function instructions(): array
    {
        return $this->instructions;
    }
}
