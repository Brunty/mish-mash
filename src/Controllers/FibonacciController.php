<?php namespace Brunty\Controllers;

use Brunty\App;

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
     * @param App $container
     */
    public function __construct(App $container)
    {
        $this->app = $container;
    }

    /**
     *
     */
    public function doAwesomeThings()
    {
        if( ! $this->app['redis']->get('sequence'))
        {
            echo "Calculating...";
            // calculate a fibonacci sequence
            $numbers = 10000000;
            $result = 0;
            for($i = 0; $i < $numbers; $i++) {
                if( ! $result = $this->app['redis']->get("fibonacci:{$i}")) {
                    $result += $i;
                    $this->app['redis']->set("fibonacci:{$i}", $result);
                }
            }
            $this->app['redis']->set('sequence', $result);
        }

        echo $this->app['redis']->get('sequence');
    }
}