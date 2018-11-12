<?php

function isArmstrong(int $n): string 
{
    $a = $n % 10;
    $b = ($n % 100 - $a) / 10;
    $c = ($n - $b * 10 - $a) / 100;
    return $a ** 3 + $b ** 3 + $c ** 3 === $n ? "Yes" : "No";
}