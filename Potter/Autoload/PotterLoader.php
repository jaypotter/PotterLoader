<?php

namespace Potter\Autoload;

require_once __DIR__ . '/Psr4/AbstractPsr4Autoloader.php';

use Potter\Autoload\Psr4\AbstractPsr4Autoloader;

final class PotterLoader extends AbstractPsr4Autoloader
{
    private const PREPEND = true; 

    public function __construct()
    {
        $this->addNamespace('Potter', __DIR__ . '/../', self::PREPEND);
    }
}