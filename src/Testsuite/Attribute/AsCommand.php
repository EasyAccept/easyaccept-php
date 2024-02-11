<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
class AsCommand
{
    public function __construct(
        public string $command
    ) {}
}
