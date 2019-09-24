<?php

function quadraticEquation($a, $b, $c)
{
    $d = sqrt($b * $b - 4 * $a * $c);
    $t = [round((-$b - $d) / (2 * $a), 2), round((-$b + $d) / (2 * $a), 2)];
    return $d != 0 ? ($d > 0 ? [min($t), max($t)] : []) : [round(-$b / (2 * $a), 2)];
}
