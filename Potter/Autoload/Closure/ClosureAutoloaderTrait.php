<?php

namespace Potter\Autoload\Closure;

use \Closure;

trait ClosureAutoloaderTrait
{
    abstract public function getClosure(): Closure;

    final public function loadClass(string $class): void
    {
        $this->getClosure()->call($this, $class);
    }
}