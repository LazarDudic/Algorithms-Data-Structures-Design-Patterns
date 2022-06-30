<?php

function binarySearch($numbers, $neeedle, $low, $high)
{
    if($low <= $high) {
        $mid = (int) (($low + $high) / 2);
        if($neeedle > $numbers[$mid]) {
            return binarySearch($numbers, $neeedle, $mid + 1, $high);
        } else if($neeedle < $numbers[$mid]) {
            return binarySearch($numbers, $neeedle, $low, $mid - 1);
        } else {
            return true;
        }
    }
    return false;
}

$numbers = range(1, 200, 1);
$number = 178;
if (binarySearch($numbers, $number, 0, count($numbers) - 1)) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}
