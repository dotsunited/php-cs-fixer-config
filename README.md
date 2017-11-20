php-cs-fixer-config
===================

[![Build Status](https://travis-ci.org/dotsunited/php-cs-fixer-config.svg?branch=master)](https://travis-ci.org/dotsunited/php-cs-fixer-config)

Configurations for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer)
used by Dots United.

## Installation

```
$ composer require --dev dotsunited/php-cs-fixer-config
```

## Usage

### Pick a configuration

The following configurations are available:

* `DotsUnited\PhpCsFixer\Php56Config`
* `DotsUnited\PhpCsFixer\Php71Config`

### Configuration

Create a configuration file `.php_cs` in the root of your project:

```php
<?php

$config = new DotsUnited\PhpCsFixer\Php56Config();

$config->getFinder()
    ->in(__DIR__);

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;
$config
    ->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

### Git

Add `.php_cs.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:

```
.php_cs.cache
```

### Travis

Update your `.travis.yml` to cache the `php_cs.cache` file:

```yml
cache:
    directories:
        - $HOME/.php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
script:
    - vendor/bin/php-cs-fixer fix --verbose --diff --dry-run
```


### Gitlab

Update your `.gitlab-ci.yml` to cache the `php_cs.cache` file:

```yml
cache:
    paths:
        - .php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
test:
    script:
        - vendor/bin/php-cs-fixer fix --verbose --diff --dry-run
```

License
-------

Copyright (c) 2017 Dots United GmbH.
Released under the [MIT](LICENSE) license.
