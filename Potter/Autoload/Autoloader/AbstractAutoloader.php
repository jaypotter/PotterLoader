<?php

namespace Potter\Autoload\Autoloader;

require_once __DIR__ . '/AutoloaderInterface.php';

use \Closure;

abstract class AbstractAutoloader implements AutoloaderInterface
{
    final public function getFunction(): Closure
    {
        return function (string $class): void {
            static::loadClass($class);
        };
    }

    abstract public function loadClass(string $class): void;
}