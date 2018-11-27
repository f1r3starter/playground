<?php

function gcd($a, $b): int
{
    if ($a < $b) {
        list($a, $b) = [$b, $a];
    }
    $rem = $a % $b;
    return $rem === 0 ? $b : gcd($b, $rem);
}

function gcdOfArray($nums): int
{
    $gcd = $nums[0];
    for ($i = 1; $i < count($nums); $i++) {
        $gcd = gcd($gcd, $nums[$i]);
    }
    return $gcd;
}