# PotterLoader

PHP 8 Autoloader

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/c44b3698e38f4bdbab9238c9702a7642)](https://www.codacy.com/gh/jaypotter/PotterLoader/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jaypotter/PotterLoader&amp;utm_campaign=Badge_Grade)
[![CodeFactor](https://www.codefactor.io/repository/github/jaypotter/potterloader/badge/main)](https://www.codefactor.io/repository/github/jaypotter/potterloader/overview/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaypotter/PotterLoader/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/jaypotter/PotterLoader/)
 [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Structure

### Registers

- AutoloadRegisterInterface (Potter\Autoload\Register)
    - AbstractAutoloadRegister (Potter\Autoload\Register)
      - **SplAutoloadRegister** (Potter\Autoload)

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

## Example

```php
<?php

require_once __DIR__ . '/Potter/Autoload/Psr4/Psr4Autoloader.php';
require_once __DIR__ . '/Potter/Autoload/SplAutoloadRegister.php';

use Potter\Autoload\{
    Psr4\Psr4Autoloader,
    SplAutoloadRegister
};

$register = new SplAutoloadRegister;
$autoloader = new Psr4Autoloader('MyNamespace', __DIR__);
$register->register($autoloader);

new MyNamespace\UserClass;
```

### Roll Your Own Autoloader

```php
<?php

namespace MyNamespace;

require_once __DIR__ . '/Potter/Autoload/Psr4/AbstractPsr4Autoloader.php';

use Potter\Autoload\Psr4\AbstractPsr4Autoloader;

final class MyNamespaceAutoloader extends AbstractPsr4Autoloader
{
    private const PREPEND = true; 

    public function __construct()
    {
        $this->addNamespace('MyNamespace', __DIR__, self::PREPEND);
    }
}
```

```php
<?php

require_once __DIR__ . '/Potter/Autoload/SplAutoloadRegister.php';
use Potter\Autoload\SplAutoloadRegister;

require_once __DIR__ . '/MyNamespaceAutoloader.php';
use MyNamespace\MyNamespaceAutoloader;

(new SplAutoloadRegister)->register(new MyNamespaceAutoloader);

new MyNamespace\UserClass;
```
