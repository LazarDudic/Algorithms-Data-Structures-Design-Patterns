<?php

class LinkedList
{
    public $head;
    public $prev = null;

    public function __construct($head)
    {
        $this->head = $head;
    }

    public function insert($data)
    {
        $node = new LinkedListNode($data);
        if(!$this->prev) {
            $this->head->next = $node;
        } else {
            $this->prev->next = $node;
        }
        $this->prev = $node;
    }

    public function insertFirst($data)
    {
        $node = new LinkedListNode($data);
        $node->next = $this->head;
        $this->head = $node;
    }

    public function insertBefore($query, $data)
    {
        $newNode = new LinkedListNode($data);
        if ($this->head->data === $query) {
            $newNode->next = $this->head;
            $this->head = $newNode;
            return;
        }
        $node = $this->head;

        while ($node != null) {
            if(! $node->next) {
                throw new Exception('Data '.$query.' not found.');
            }
            if($node->next->data === $query) {
                $newNode->next = $node->next;
                $node->next = $newNode;  
                break;             
            }
            $node = $node->next;
        }
    }

    public function insertAfter($query, $data)
    {
        $newNode = new LinkedListNode($data);
        $node = $this->head;
        while ($node != null) {
            if($node->data === $query) {
                if($node === $this->prev) {
                    $this->prev = $newNode;
                }
                $newNode->next = $node->next;
                $node->next = $newNode;
                return;
            }
            $node = $node->next;
        }

        throw new Exception('Data '.$query.' not found.');
    }

    public function delete($query)
    {
        if ($this->head->data === $query) {
            $this->head = $this->head->next;
            return;
        }

        $node = $this->head;
        while ($node != null) {
            if($node->next->data === $query) {
                if($node->next === $this->prev) {
                    $this->prev = $node; 
                }

                $node->next = $node->next->next;
                return;
            }
            $node = $node->next;
        }

        throw new Exception('Data '.$query.' not found.');
    }

    public function print()
    {
        $node = $this->head;
        if ($node != null) {
            while ($node != null) {
                echo $node->data . " ";
                $node = $node->next;
            }
        } else {
            echo "The list is empty.";
        }
    }
}
