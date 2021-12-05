<?php

namespace Potter\Autoload\Register;

require_once __DIR__ . '/../Autoloader/AutoloaderInterface.php';

use Potter\Autoload\Autoloader\AutoloaderInterface;

use \Countable;

interface AutoloadRegisterInterface
{
    public const PREPEND = FALSE;

    public const THROW = TRUE;

    public static function call(string $class): void;

    public static function getFunctions(): array;

    public static function register(AutoloaderInterface $autoloader, bool $prepend = self::PREPEND): int;

    public static function unregister(int $index): void;
}