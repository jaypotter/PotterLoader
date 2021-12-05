# PotterLoader
PHP Autoloader

[![CodeFactor](https://www.codefactor.io/repository/github/jaypotter/potterloader/badge/main)](https://www.codefactor.io/repository/github/jaypotter/potterloader/overview/main)

### Registers
- AutoloadRegisterInterface (Potter\Autoload\Register)
  - AbstractAutoloadRegister (Potter\Autoload\Register)
    - SplAutoloadRegister (Potter\Spl\Autoload)

### Autoloaders
- AutoloaderInterface (Potter\Autoload\Autoloader)
  - AbstractAutoloader (Potter\Autoload\Autoloader)
  - ClosureAutloaderInterface (Potter\Autoload\Closure)
    - AbstractClosureAutoloader (Potter\Autoload\Closure)
      - ClosureAutoloaderTrait (Potter\Autoload\Closure)
        - CallableAutoloader (Potter\Autoload\Closure)
        - ClosureAutoloader (Potter\Autoload\Closure)
