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
    public function __construct(Client $cache, FibonacciGenerator $generator)
    {
        $this->generator = $generator;
        $this->cache = $cache;
    }

    /**
     *  That's right, do awesome things.
     */
    public function doAwesomeThings()
    {
        if(isset($_GET['flush'])) $this->cache->flushdb(); // flush the redis db so it will always re-calculate
        $length = isset($_GET['length']) ? (int)$_GET['length'] : 100; // todo: filter inputs properly

        $key = "fibonacci.sequence.{$length}";
        if ( ! $result = $this->cache->get($key)) {
            $result = $this->generator->generate($length);
            $this->cache->set($key, $result);
        }

        echo $result;
    }
}