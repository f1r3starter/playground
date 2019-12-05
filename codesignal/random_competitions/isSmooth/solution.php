<?php

function isSmooth($a)
{
    $c = count($a) - 1;
    if ($a[0] != $a[$c]) return false;
    return (($c + 1) % 2) ? $a[$c / 2] == $a[0] : array_sum(array_slice($a, $c / 2, 2)) == $a[0];
}
