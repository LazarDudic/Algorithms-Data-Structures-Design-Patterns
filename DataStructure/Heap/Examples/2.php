<?php

require_once __DIR__ . './../Classes/MaxHeap.php';

try {

    $numbers = [37, 44, 34, 65, 26, 83, 129, 86, 9];
    echo "Initial array \n" . implode("\t", $numbers) . "\n";
    $heap = new MaxHeap($numbers);
    
    echo "Constructed Heap\n";
    echo implode("\t", $heap->getHeap()); "\n";

} catch (Exception $e) {
    echo $e->getMessage();
} 