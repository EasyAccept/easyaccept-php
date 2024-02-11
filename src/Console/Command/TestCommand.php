<?php declare(strict_types=1);

namespace EasyAccept\Console\Command;

use EasyAccept\Testsuite\Exception\EasyAcceptException;
use EasyAccept\Testsuite\Facade\EasyAcceptFacade;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\Output;
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
        $this->addArgument('provider', InputArgument::REQUIRED, 'Application provider to run commands')
             ->addArgument('tests', InputArgument::IS_ARRAY, 'The tests to run')
             ->addOption('prefix', '-p', InputOption::VALUE_REQUIRED, 'Prefix added on each test file', '');
    }

    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $provider = $input->getArgument('provider');
        $prefix = $input->getOption('prefix');
        $tests = array_map(fn($t) => $prefix . $t, $input->getArgument('tests'));
        if (count($tests) > 0) {
            try {
                $io->writeln("Provider: {$provider}", OutputInterface::VERBOSITY_VERBOSE);
                $io->writeln('Running tests: ' . implode(', ', $tests), OutputInterface::VERBOSITY_VERBOSE);
                $easyAccept = new EasyAcceptFacade($provider, $tests, $io);
                $easyAccept->runTests();
                $output->writeln('Test command executed', OutputInterface::VERBOSITY_VERBOSE);
                if ($easyAccept->hasErrors()) {
                    $io->error([
                        'Some errors occurred during the execution of the tests:',
                        ...array_map(fn(EasyAcceptException $e) => '- ' . $e->getMessage(), $easyAccept->errors())
                    ]);
                    return Command::FAILURE;
                }
                $io->success('All tests passed');
            } catch (EasyAcceptException $e) {
                $io->error($e->getMessage());
                return Command::FAILURE;
            }
        } else {
            $io->error('Please, provide at least one test to run');
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}