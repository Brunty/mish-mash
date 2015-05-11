<?php

use Brunty\Controllers\HomeController;

// work out a way of dispatching to a controller maybe?
$app['router']->respond(
    'GET',
    '/hello-world',
    function () use ($app) {
        return (new HomeController($app))->index();
    }
);