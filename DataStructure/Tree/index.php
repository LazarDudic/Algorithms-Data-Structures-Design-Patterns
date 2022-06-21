<?php

require_once "./Three.php";
require_once "./ThreeNode.php";

try {
    $grandfather = new TreeNode("Grandfather");

    $tree = new Tree($grandfather);

    $father = new TreeNode("Father");
    $aunt = new TreeNode("Aunt");
    $uncle = new TreeNode("Uncle");

    $grandfather->addChildren($father);
    $grandfather->addChildren($aunt);
    $grandfather->addChildren($uncle);

    $me = new TreeNode("Me");
    $olderSister = new TreeNode("Older Sister");
    $youngerBrother = new TreeNode("Younger Brother");
    $cousin1 = new TreeNode("Cousin 1");
    $cousin2 = new TreeNode("Cousin 2");

    $father->addChildren($olderSister);
    $father->addChildren($me);
    $father->addChildren($youngerBrother);
    $aunt->addChildren($cousin1);
    $uncle->addChildren($cousin2);

    $tree->traverse($tree->root);
} catch (Exception $e) {
    echo $e->getMessage();
}