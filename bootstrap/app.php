<?php
require __DIR__ . '/../vendor/autoload.php';
require 'bindings.php';
require 'routes.php';

$app->bindServiceProviders();
$app->registerServiceProviders();

Dotenv::load(__DIR__ . '/..');