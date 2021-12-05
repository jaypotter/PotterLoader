# PotterLoader
PHP 8 Autoloader

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/3d23951182a1428894edc76775e8a7b2)](https://app.codacy.com/gh/jaypotter/PotterLoader?utm_source=github.com&utm_medium=referral&utm_content=jaypotter/PotterLoader&utm_campaign=Badge_Grade_Settings)
[![CodeFactor](https://www.codefactor.io/repository/github/jaypotter/potterloader/badge/main)](https://www.codefactor.io/repository/github/jaypotter/potterloader/overview/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaypotter/PotterLoader/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/jaypotter/PotterLoader/)

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

### Example
```
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

```
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

```
<?php

require_once __DIR__ . '/Potter/Autoload/SplAutoloadRegister.php';
use Potter\Autoload\SplAutoloadRegister;

require_once __DIR__ . '/MyNamespaceAutoloader.php';
use MyNamespace\MyNamespaceAutoloader;

(new SplAutoloadRegister)->register(new MyNamespaceAutoloader);

new MyNamespace\UserClass;
```
