<?php

namespace Potter\Autoload\Closure;

require_once __DIR__ . '/AbstractClosureAutoloader.php';
require_once __DIR__ . '/ClosureAutoloaderTrait.php';

use \Closure;

final class ClosureAutoloader extends AbstractClosureAutoloader
{
    use ClosureAutoloaderTrait;

    public function __construct(private Closure $closure)
    { }
}