<?php

function gcd($a, $b) {
    if ($a < $b) {
        list($a,$b) = [$b, $a];
    }
    $rem = $a % $b;
    return $rem === 0 ? $b : gcd($b, $rem);
}