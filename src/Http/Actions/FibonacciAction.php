<?php namespace Brunty\Http\Actions;

use Brunty\App;
use Brunty\FibonacciGenerator;
use Predis\Client;

/**
 * Class FibonacciAction
 * @package Brunty\Http\Actions
 */
class FibonacciAction extends BaseAction
{

    /**
     * @var App
     */
    private $app;
    /**
     * @var FibonacciGenerator
     */
    private $generator;

    /**
     * @param Client             $cache
     * @param FibonacciGenerator $generator
     *
     */
    public function __construct(App $app, FibonacciGenerator $generator)
    {
        $this->generator = $generator;
        $this->app = $app;
    }

    /**
     *  That's right, do awesome things.
     */
    public function doAwesomeThings()
    {
        if(isset($_GET['flush'])) $this->app['redis']->flushdb(); // flush the redis db so it will always re-calculate
        $length = isset($_GET['length']) ? (int)$_GET['length'] : 100; // todo: filter inputs properly

        $key = "fibonacci.sequence.{$length}";
        if ( ! $result = $this->app['redis']->get($key)) {
            $result = $this->generator->generate($length);
            $this->app['event']->emit('fibonacci.sequence.generated', [$result]);
            $this->app['redis']->set($key, $result);
            $this->app['event']->emit('fibonacci.sequence.cached', [$result]);
        }
        echo $result;
    }
}