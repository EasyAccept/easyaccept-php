<?php declare(strict_types=1);

namespace EasyAccept\Console\Command;

use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Facade\EasyAcceptFacade;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'test',
    description: 'Run the required tests',
)]
class TestCommand extends Command
{

    #[\Override]
    protected function configure()
    {
        $this->addArgument('tests', InputArgument::IS_ARRAY, 'The tests to run');
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $tests = $input->getArgument('tests');
        if (count($tests) > 0) {
            $io->writeln('Running tests: ' . implode(', ', $tests), OutputInterface::VERBOSITY_VERBOSE);
            try {
                (new EasyAcceptFacade($tests, $io))->handleTests();
            } catch (EasyAcceptException $e) {
                $io->error($e->getMessage());
                return Command::FAILURE;
            }
            $output->writeln('Test command executed', OutputInterface::VERBOSITY_VERBOSE);
        } else {
            $output->writeln('Please, provide at least one test to run');
        }
        return Command::SUCCESS;
    }
}