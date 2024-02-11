<?php declare(strict_types=1);

namespace EasyAccept\Console;

use EasyAccept\Console\Command\TestCommand;
use Symfony\Component\Console\Application;

class Kernel
{
    private Application $application;

    public function __construct()
    {
        $this->application = new Application(name: 'EasyAccept', version: 'beta-version');
        $this->application->add(new TestCommand());
    }

    public function run()
    {
        $this->application->run();
    }
}