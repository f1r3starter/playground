<?php

function arraySumAdjacentDifference($i) {
    for (;0 < count($i) - ++$t;)
        $s += abs($i[$t] - $i[$t-1]);
    return $s;
}
