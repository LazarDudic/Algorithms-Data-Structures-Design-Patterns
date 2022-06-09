<?php

// Step 1 − Create a new node at the end of heap.
// Step 2 − Assign new value to the node.
// Step 3 − Compare the value of this child node with its parent.
// Step 4 − If value of parrent is less than child, then swap them.
// Step 5 − Repeat step 3 & 4 until Heap property holds.

class MaxHeap
{
    private $heap;
    private $count = 0;

    public function __construct(array $values)
    {
        foreach ($values as $val) {
            $this->insert($val);
        }
    }

    public function insert(int $int)
    {
        if($this->count === 0) {
            $this->heap[1] = $int;
            $this->count = 2;
        }  else {
            $this->heap[$this->count++] = $int;
            $this->moveUp();
        }
    }

    public function moveUp() {
        $currentNode = intval($this->count - 1);
        $parent = intval($currentNode / 2);

        while ($parent > 0 && $this->heap[$currentNode] > $this->heap[$parent]) {
            $this->swap($currentNode, $parent);
            $currentNode = intval($currentNode / 2);
            $parent = intval($parent / 2);
        }
    }

    public function swap(int $a, int $b) 
    {
        $t = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b]; 
        $this->heap[$b] = $t; 
    }

    public function getHeap()
    {
        return $this->heap;
    }

}