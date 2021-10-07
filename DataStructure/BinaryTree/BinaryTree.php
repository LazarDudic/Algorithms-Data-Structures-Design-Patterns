<?php

class BinaryTree {
    public $root;

    public function __construct($root) 
    {
        $this->root = $root;
    }

    public function traverse($node) 
    {
        echo $node->data . "\n";

        if ($node->left) {
            $this->traverse($node->left);
        }
        if ($node->right) {
            $this->traverse($node->right);
        }
    }
}