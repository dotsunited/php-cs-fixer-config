<?php

$config = new DotsUnited\PhpCsFixer\Php56Config();

$config->getFinder()
    ->in(__DIR__)
;

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;
$config
    ->setCacheFile($cacheDir . '/.php_cs.cache')
;

return $config;
