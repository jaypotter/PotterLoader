<?php

namespace Potter\Autoload\Psr4;

require_once __DIR__ . '/Psr4AutoloaderInterface.php';
require_once __DIR__ . '/../Autoloader/AbstractAutoloader.php';

use Potter\Autoload\Autoloader\AbstractAutoloader;

abstract class AbstractPsr4Autoloader extends AbstractAutoloader implements Psr4AutoloaderInterface
{
    private array $prefixes = [];

    final public function addNamespace(string $prefix, string $baseDir, bool $prepend = false): void
    {
        $prefix = trim($prefix, '\\') . '\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . '/';
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $baseDir);
        } else {
            array_push($this->prefixes[$prefix], $baseDir);
        }
        print_r($this->prefixes);
    }

    final public function loadClass(string $class): void
    {
        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relativeClass = substr($class, $pos + 1);
            $mappedFile = $this->loadMappedFile($prefix, $relativeClass);
            if ($mappedFile) {
                return;
            }
            $prefix = rtrim($prefix, '\\');
        }
    }
    
    private function loadMappedFile(string $prefix, string $relativeClass): void
    {
        if (isset($this->prefixes[$prefix]) === false) {
            return;
        }
        foreach ($this->prefixes[$prefix] as $baseDir) {
            $file = $baseDir
                  . str_replace('\\', '/', $relativeClass)
                  . '.php';
            if ($this->requireFile($file)) {
                return;
            }
        }
    }

    private function requireFile(string $file): void
    {
        if (file_exists($file)) {
            require $file;
        }
    }

}