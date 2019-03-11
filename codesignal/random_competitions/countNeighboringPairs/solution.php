<?php

function countNeighbouringPairs($a) {
    $a = str_split($a);
    for ($i = 1; $i < count($a); $i++) {
        $a[$i] != $a[$i-1] ?: ++$t;
    }
    return $t ?: 0;
}
