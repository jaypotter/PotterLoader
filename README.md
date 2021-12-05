# PotterLoader
PHP Autoloader

[![CodeFactor](https://www.codefactor.io/repository/github/jaypotter/potterloader/badge/main)](https://www.codefactor.io/repository/github/jaypotter/potterloader/overview/main)

### Registers
- AutoloadRegisterInterface (Potter\Autoload\Register)
  - AbstractAutoloadRegister (Potter\Autoload\Register)
    - **SplAutoloadRegister** (Potter\Spl\Autoload)

### Autoloaders
- AutoloaderInterface (Potter\Autoload\Autoloader)
  - AbstractAutoloader (Potter\Autoload\Autoloader)
    - ClosureAutloaderInterface (Potter\Autoload\Closure)
      - AbstractClosureAutoloader (Potter\Autoload\Closure)
        - ClosureAutoloaderTrait (Potter\Autoload\Closure)
          - **CallableAutoloader** (Potter\Autoload\Closure)
          - **ClosureAutoloader** (Potter\Autoload\Closure)
    - Psr4AutoloaderInterface (Potter\Autoload\Psr4)
      - AbstractPsr4Autoloader (Potter\Autoload\Psr4)
        - **Psr4Autoloader** (Potter\Autoload\Psr4)

### Example
```
<?php

require_once __DIR__ . '/Potter/Autoload/Psr4/Psr4Autoloader.php';
require_once __DIR__ . '/Potter/Spl/Autoload/SplAutoloadRegister.php';

use Potter\{
    Autoload\Psr4\Psr4Autoloader,
    Spl\Autoload\SplAutoloadRegister
};

$register = new SplAutoloadRegister;
$autoloader = new Psr4Autoloader('MyNamespace', __DIR__ . '/MyNamespace');

$register->register($autoloader);
```
