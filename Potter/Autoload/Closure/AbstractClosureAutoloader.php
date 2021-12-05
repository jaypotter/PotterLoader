<?php

namespace Potter\Autoload\Closure;

require_once __DIR__ . '/ClosureAutoloaderInterface.php';

require_once __DIR__ . '/../Autoloader/AbstractAutoloader.php';

use Potter\Autoload\Autoloader\AbstractAutoloader;
use \Closure;

abstract class AbstractClosureAutoloader extends AbstractAutoloader implements ClosureAutloaderInterface
{
    protected Closure $closure;

    final public function getClosure(): Closure
    {
        return $this->closure;
    }
}