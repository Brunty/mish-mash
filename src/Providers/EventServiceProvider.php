<?php namespace Brunty\Providers;

use Evenement\EventEmitter;

/**
 * Class EventServiceProvider
 * @package Brunty\Providers
 */
class EventServiceProvider implements ProviderInterface
{

    /**
     * @param $app
     */
    public function bind($app)
    {
        $app['event'] = function ($c) {
            return new EventEmitter();
        };
    }


    /**
     * @param $app
     *
     * @return mixed|void
     */
    public function register($app)
    {
        $app['event']->on(
            'index.viewed',
            function () {
                echo "index was viewed";
            }
        );

        $app['event']->on(
            'fibonacci.sequence.generated',
            function ($result) {
                echo "Sequence viewed: {$result} <br />";
            }
        );

        $app['event']->on(
            'fibonacci.sequence.cached',
            function ($result) {
                echo "Sequence cached: {$result} <br />";
            }
        );
    }
}