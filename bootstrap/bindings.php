<?php
use Brunty\App;

$app = new App;

$app['router'] = function ($c) {
    return new \Klein\Klein();
};

$app['redis'] = function($c) {
    return new Predis\Client();
};