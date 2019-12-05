<?php

function countNeighbouringPairs($a)
{
    $a = str_split($a);
    for ($i = 1, $iMax = count($a); $i < $iMax; $i++) {
        $a[$i] != $a[$i - 1] ?: ++$t;
    }
    return $t ?: 0;
}
