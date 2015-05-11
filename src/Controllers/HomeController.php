<?php namespace Brunty\Controllers;

use Brunty\App;

/**
 * Class HomeController
 * @package Brunty\Controllers
 */
class HomeController extends BaseController
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
     * @return string
     */
    public function index()
    {
        return $this->app['view']->render('welcome/welcome.twig', ['message'    =>  'Index page']);
    }

    /**
     * @return string
     */
    public function helloWorld() {
        $this->app['redis']->set('foo', 'bar');
        return "Hello world! " . $this->app['redis']->get('foo');
    }
}