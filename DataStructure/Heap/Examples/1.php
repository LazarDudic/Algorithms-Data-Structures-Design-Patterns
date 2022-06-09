<?php

require_once __DIR__ . './../Classes/MinHeap.php';

try {
    $numbers = [38, 45, 34, 66, 27, 81, 123, 83, 2];
    echo "Initial array \n" . implode("\t", $numbers) . "\n";
    $heap = new MinHeap($numbers);
    
    echo "Constructed Heap\n";
    echo implode("\t", $heap->getHeap()); "\n";

} catch (Exception $e) {
    echo $e->getMessage();
} 