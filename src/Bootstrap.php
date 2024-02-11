<?php declare(strict_types=1);
namespace EasyAccept;

use EasyAccept\Console\Kernel;

class Bootstrap
{
    private Kernel $consoleKernel;

    public function __construct()
    {
        $this->consoleKernel = new Kernel();
    }

    public function boot()
    {
        // ...
    }

    public function start()
    {
        $this->consoleKernel->run();
    }

    public function shutdown()
    {
        // ...
    }
}
