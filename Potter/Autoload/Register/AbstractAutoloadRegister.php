<?php

namespace Potter\Autoload\Register;

require_once __DIR__ . '/AutoloadRegisterInterface.php';

require_once __DIR__ . '/../Autoloader/AutoloaderInterface.php';

use Potter\Autoload\Autoloader\AutoloaderInterface;

abstract class AbstractAutoloadRegister implements AutoloadRegisterInterface
{
    abstract public static function call(string $class): void;

    abstract public static function getFunctions(): array;

    abstract public static function register(AutoloaderInterface $autoloader, bool $prepend = self::PREPEND): int;

    abstract public static function unregister(int $index): void;
}