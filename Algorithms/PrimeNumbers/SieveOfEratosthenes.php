<?php 

function sieveOfEratosthenes(int $n)
{
    $prime = array_fill(0, $n + 1, true);

    for ($p = 2; $p * $p <= $n; $p++) {
        // If prime[p] is not changed, then it is a prime
        if ($prime[$p] == true) {
            // Update all multiples of p
            for ($i = $p * 2; $i <= $n; $i += $p) {
                $prime[$i] = false;
            }
        }
    }

    for ($p = 2; $p <= $n; $p++) {
        if ($prime[$p]) {
            echo $p . " ";
        }
    }
}


sieveOfEratosthenes(100);