<?php

use Brunty\Http\Actions\FibonacciAction;
use Brunty\Http\Actions\HomeAction;
use Brunty\FibonacciGenerator;

// work out a way of dispatching to a controller maybe?
$app['router']->respond(
    'GET',
    '/',
    function () use ($app) {
        return (new HomeAction($app))->index();
    }
);
$app['router']->respond(
    'GET',
    '/hello-world',
    function () use ($app) {
        return (new HomeAction($app))->helloWorld();
    }
);
$app['router']->respond(
    'GET',
    '/fibonacci',
    function () use ($app) {
        return (new FibonacciAction($app['redis'], new FibonacciGenerator($app['redis'])))->doAwesomeThings();
    }
);