<?php namespace Brunty\Controllers;

use Brunty\App;
use Brunty\FibonacciGenerator;

/**
 * Class FibonacciController
 * @package Brunty\Controllers
 */
class FibonacciController extends BaseController
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
     * @param App $container
     */
    public function __construct(App $container, FibonacciGenerator $generator)
    {
        $this->app = $container;
        $this->generator = $generator;
    }

    /**
     *
     */
    public function doAwesomeThings()
    {
        //$this->app['redis']->flushdb(); // flush the redis db so it will always re-calculate
        $length = isset($_GET['length']) ? (int)$_GET['length'] : 100; // todo: filter inputs properly

        $key = "fibonacci.sequence.{$length}";
        if ( ! $result = $this->app['redis']->get($key)) {
            $result = $this->generator->generate($length);
            $this->app['redis']->set($key, $result);
        }

        echo $result;
    }
}