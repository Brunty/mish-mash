<?php

use Brunty\Controllers\FibonacciController;
use Brunty\Controllers\HomeController;
use Brunty\FibonacciGenerator;

// work out a way of dispatching to a controller maybe?
$app['router']->respond(
    'GET',
    '/',
    function () use ($app) {
        return (new HomeController($app))->index();
    }
);
$app['router']->respond(
    'GET',
    '/hello-world',
    function () use ($app) {
        return (new HomeController($app))->helloWorld();
    }
);
$app['router']->respond(
    'GET',
    '/fibonacci',
    function () use ($app) {
        return (new FibonacciController($app, new FibonacciGenerator($app['redis'])))->doAwesomeThings();
    }
);