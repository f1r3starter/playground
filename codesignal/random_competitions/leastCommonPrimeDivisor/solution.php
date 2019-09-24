<?php

function leastCommonPrimeDivisor($a, $b)
{
    for ($i = 1; $i++ <= max($b, $a);)
        if (!max($a % $i, $b % $i))
            return $i;
    return -1;
}
