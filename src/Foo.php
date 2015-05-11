<?php namespace Brunty;

/**
 * Class TestClass
 * @package Brunty
 */
class Foo
{

    /**
     * @var array
     */
    private $items;

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function bar()
    {
        return $this->items[rand(0, (count($this->items) - 1))];
    }
}