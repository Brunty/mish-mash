<?php namespace Brunty\Providers;

interface ProviderInterface {
    public function bind($app);
    public function register($app);
}