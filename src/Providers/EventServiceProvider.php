<?php namespace Brunty\Providers;

use Evenement\EventEmitter;

class EventServiceProvider implements ProviderInterface {

    public function bind($app) {
        $app['event'] = function ($c) {
            return new EventEmitter();
        };
    }

    public function register($app)
    {
        $app['event']->on('index.viewed', function() {
            echo "index was viewed";
        });
    }
}