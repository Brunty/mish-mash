<?php namespace Brunty;

use Predis\Client;

class FibonacciGenerator
{

    /**
     * @var Client
     */
    private $cache;

    public function __construct(Client $cache) {
        $this->cache = $cache;
    }

    public function generate($numbers = null)
    {
        if ( ! $numbers || ! is_int($numbers) || $numbers <= 0) {
            throw new Exception(
                'Numbers must not be null, must be greater than 0 and must be a valid integer. Value given: {$numbers}'
            );
        }

        $result = 0;
        for ($i = 0; $i <= $numbers; $i++) {
            $result += $i;
        }

        return $result;
    }
}