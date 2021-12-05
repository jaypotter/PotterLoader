<?php

namespace Potter\Autoload\Closure;

require_once __DIR__ . '/../Autoloader/AutoloaderInterface.php';

use Potter\Autoload\Autoloader\AutoloaderInterface;
use \Closure;

interface ClosureAutloaderInterface extends AutoloaderInterface
{
    public function getClosure(): Closure;
}