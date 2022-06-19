<?php
require_once "./Stack.php";
try {
    $stack = new Stack(10);
    $stack->push("Stack-1");
    $stack->push("Stack-2");
    $stack->push("Stack-3");
    echo $stack->pop()."\n";
    echo $stack->top()."\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
