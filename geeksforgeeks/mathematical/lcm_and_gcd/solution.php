<?php

function gcd($a, $b) {
    if ($a < $b) {
        list($a,$b) = [$b, $a];
    }
    $rem = $a % $b;
    return $rem === 0 ? $b : gcd($b, $rem);
}

function lcm($a,$b) {
    return abs($a * $b) / gcd($a, $b);
}