<?php namespace Brunty;

use Pimple\Container;

/**
 * Class App
 * @package Brunty
 */
class App extends Container
{

    /**
     * Run the bindings for our service providers in our system
     */
    public function bindServiceProviders()
    {
        foreach($this['config']['app']['providers'] as $providerClassName) {
            $provider = new $providerClassName;
            $provider->bind($this);
        }
    }

    /**
     * Run the register methods on the service providers in our system
     */
    public function registerServiceProviders()
    {
        foreach($this['config']['app']['providers'] as $providerClassName) {
            $provider = new $providerClassName;
            $provider->register($this);
        }
    }

}