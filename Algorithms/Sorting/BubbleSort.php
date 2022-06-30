<?php

function bubbleSort($arr) {
    $count = 0;
    $len = count($arr);

    for ($i=0; $i < $len; $i++) { 
        for ($x=0; $x < $len -1; $x++) { 
            if($arr[$x] > $arr[$x+1]) {
                $tmp = $arr[$x];
                $arr[$x] = $arr[$x+1];
                $arr[$x+1] = $tmp;
            }
            $count++;
        }
    }

    echo "Comparisons: ".$count . "\n";
    return $arr;
}

$arr = [25, 40, 92, 63, 12, 97, 56, 86, 33, 91];

$sortedArray = bubbleSort($arr);
echo implode(",", $sortedArray);