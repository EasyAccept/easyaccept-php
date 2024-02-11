<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Facade;

use EasyAccept\Testsuite\Exception\EasyAcceptException;
use Symfony\Component\Console\Style\SymfonyStyle;

class EasyAcceptFacade
{
    /**
     * @param array<string> $tests List of tests to be run
     * @param SymfonyStyle $io SymfonyStyle Instance to interact with the console
     */
    public function __construct(
        private array $tests,
        private SymfonyStyle $io
    ) { }

    public function handleTests()
    {
        // Check if the tests exists
        foreach ($this->tests as $test) {
            if (!$this->_fileExists($test)) {
                throw new EasyAcceptException("Test file $test does not exist");
            }
        }
    }

    private function _fileExists(string $test): bool
    {
        return file_exists($test);
    }
}
