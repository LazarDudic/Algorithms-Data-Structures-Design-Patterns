<?php

require_once "./StackInterface.php";
require_once "../LinkedList/LinkedList.php";

class Stack implements StackInterface
{
    private $limit;
    private $stack = [];

    public function __construct($limit = 10)
    {
        $this->limit = $limit;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new Exception('Stack is empty');
        } else {
            $lastItem = $this->top();
            array_pop($this->stack);
            return $lastItem;
        }
    }

    public function push($newItem)
    {
        if (count($this->stack) >= $this->limit) {
            throw new Exception('Stack is full');
        }
        array_push($this->stack, $newItem);
    }

    public function top()
    {
        return end($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }
}
