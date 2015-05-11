<?php
use Brunty\App;
use Klein\Klein;
use Predis\Client as Redis;

$app = new App;

$app['router'] = function ($c) {
    return new Klein();
};

$app['redis'] = function($c) {
    return new Redis();
};