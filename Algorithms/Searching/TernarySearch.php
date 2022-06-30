<?php

function ternarySearch($start, $lenght, $search, $array)
{
    if ($lenght >= $start) {
        $mid1 = (int)($start + ($lenght - $start) / 3);
        $mid2 = (int)($lenght - ($lenght - $start) / 3);
        if ($array[$mid1] === $search) {
            return $mid1;
        }
        if ($array[$mid2] === $search) {
            return $mid2;
        }

        if ($search < $array[$mid1]) {
            return ternarySearch($start, $mid1 - 1, $search, $array);
        } else if ($search > $array[$mid2]) {
            return ternarySearch($mid2 + 1, $lenght, $search, $array);
        } else {
            return ternarySearch($mid1 + 1, $mid2 - 1, $search, $array);
        }
    }

    return -1;
}

$array = range(1, 200, 6);
$start = 0;
$lenght = count($array) - 1;
$search = 56;

if(($key = ternarySearch($start, $lenght, $search, $array)) !== -1) {
    echo "Index of $search is $key \n";
} else {
    echo "$search Not found \n";
}


