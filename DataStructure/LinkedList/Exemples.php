<?php

require_once './LinkedList.php';
require_once './LinkedListNode.php';

$node1 = new LinkedListNode(1);
$linkedList = new LinkedList($node1);
$linkedList->insert(2);
$linkedList->insert(3);
$linkedList->insert(4);
$linkedList->insert(5);
$linkedList->insertFirst(6);
$linkedList->insertAfter(5, 7);
$linkedList->insert(8);
$linkedList->insertBefore(6, 9);
$linkedList->delete(3);


$linkedList->print();
