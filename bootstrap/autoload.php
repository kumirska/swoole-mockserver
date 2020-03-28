<?php

$loader     = require 'vendor/autoload.php';
$namespaces = require 'config/namespaces.php';

foreach ($namespaces as $namespace => $path) {
    $loader->addPsr4("{$namespace}\\", __DIR__ . '/../' . $path);
}