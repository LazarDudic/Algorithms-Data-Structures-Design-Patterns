<?php

function binarySearch(array $numbers, int $neeedle): bool
{
    $low = 0;
    $high = count($numbers) - 1;
    while ($low <= $high) {
        $mid = (int) (($low + $high) / 2);
        if ($numbers[$mid] > $neeedle) {
            $high = $mid - 1;
        } else if ($numbers[$mid] < $neeedle) {
            $low = $mid + 1;
        } else {
            return true;
        }
    }
    return false;
}

$numbers = range(1, 200, 3);

$number = 196;
if (binarySearch($numbers, $number)) {
    echo "$number Found \n";
} else {
    echo "$number Not found \n";
}
