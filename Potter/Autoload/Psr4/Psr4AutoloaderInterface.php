<?php

namespace Potter\Autoload\Psr4;

require_once __DIR__ . '/../Autoloader/AutoloaderInterface.php';

use Potter\Autoload\Autoloader\AutoloaderInterface;

interface Psr4AutoloaderInterface extends AutoloaderInterface
{
    public function addNamespace(string $prefix, string $baseDir, bool $prepend = false): void;
}