<?php

function gcd($a, $b) {
    if ($a < $b) {
        list($a,$b) = [$b, $a];
    }
    $rem = $a % $b;
    return $rem === 0 ? $b : gcd($b, $rem);
}

function addFractions($num1, $den1, $num2, $den2)
{
    $a = $num1 * $den2 + $num2 * $den1;
    $b = $den1 * $den2;
    $gcdN = gcd($a, $b);
    return sprintf("%d/%d", (int)($a/$gcdN), (int)($b/$gcdN));
}
