<?php namespace Brunty\Controllers;

use Brunty\App;

class HomeController
{

    /**
     * @var App
     */
    private $container;

    public function __construct(App $container)
    {

        $this->container = $container;
    }

    public function index()
    {
        $this->container['redis']->set('foo', 'bar');

        return "Hello world! " . $this->container['redis']->get('foo');
    }
}