<?php

require_once './BinaryNode.php';
require_once './BinaryTree.php';

$final = new BinaryNode('Root');
$tree = new BinaryTree($final);

$first1 = new BinaryNode("First-1");
$first2 = new BinaryNode("First-2");
$second1 = new BinaryNode("Second-1");
$second2 = new BinaryNode("Second-2");
$second3 = new BinaryNode("Second-3");
$second4 = new BinaryNode("Second-4");

$final->addChildren($first1, $first2);
$first1->addChildren($second1, $second2);
$first2->addChildren($second3, $second4);

$tree->traverse($tree->root);