<?php

namespace Potter\Spl\Autoload;

require_once __DIR__ . '/../../Autoload/Autoloader/AutoloaderInterface.php';
require_once __DIR__ . '/../../Autoload/Register/AbstractAutoloadRegister.php';

use Potter\Autoload\{
    Autoloader\AutoloaderInterface,
    Register\AbstractAutoloadRegister
};

final class SplAutoloadRegister extends AbstractAutoloadRegister
{
    private static int $count = 0;

    public static function call(string $class): void
    {
        spl_autoload_call($class);
    }

    public static function getFunctions(): array
    {
        return spl_autoload_functions();
    }

    public static function register(AutoloaderInterface $autoloader, bool $prepend = self::PREPEND): int
    {
        spl_autoload_register($autoloader->getFunction(), self::THROW, $prepend);
        self::$count++;
        return $prepend ? 0 : self::$count - 1;
    }

    public static function unregister(int $index): void
    {
        spl_autoload_unregister(
            callback: self::getFunctions()[$index]
        );
        self::$count--;
    }
}