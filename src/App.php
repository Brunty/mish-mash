<?php namespace Brunty;

use Pimple\Container;

/**
 * Class App
 * @package Brunty
 */
class App extends Container
{
    public function bindServiceProviders()
    {
        foreach($this['config']['app']['providers'] as $providerClassName) {
            $provider = new $providerClassName;
            $provider->bind($this);
        }
    }

    public function registerServiceProviders()
    {
        foreach($this['config']['app']['providers'] as $providerClassName) {
            $provider = new $providerClassName;
            $provider->register($this);
        }
    }

}