<?php

namespace Potter\Autoload\Autoloader;

use \Closure;

interface AutoloaderInterface
{
    public function getFunction(): Closure;

    public function loadClass(string $class): void;
}