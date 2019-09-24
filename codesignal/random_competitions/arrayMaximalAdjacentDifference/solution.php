<?php

function arrayMaximalAdjacentDifference($a)
{
    while ($i < count($a)) {
        $r[] = abs($a[$i - 1] - $a[$i++]);
    }
    return max($r);
}
