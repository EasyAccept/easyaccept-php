<?php declare(strict_types=1);

include 'vendor/autoload.php';

use EasyAccept\Bootstrap;

$bootstrap = new Bootstrap();
$bootstrap->boot();
$bootstrap->start();
$bootstrap->shutdown();
