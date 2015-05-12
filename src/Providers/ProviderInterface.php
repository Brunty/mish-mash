<?php namespace Brunty\Providers;

/**
 * Interface ProviderInterface
 * @package Brunty\Providers
 */
interface ProviderInterface {

    /**
     * @param $app
     *
     * @return mixed
     */
    public function bind($app);

    /**
     * @param $app
     *
     * @return mixed
     */
    public function register($app);
}