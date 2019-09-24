<?php

function greatestCommonPrimeDivisor($a, $b)
{
    if ($a < $b) {
        list($a, $b) = [$b, $a];
    }
    $rem = $a % $b;
    if ($rem === 0) {
        foreach (range(2, 7) as $i)
            if ($b !== $i && $b % $i == 0)
                return greatestCommonPrimeDivisor($b, $b / $i);
        return $b == 1 ? -1 : $b;
    }

    return greatestCommonPrimeDivisor($b, $rem);
}
