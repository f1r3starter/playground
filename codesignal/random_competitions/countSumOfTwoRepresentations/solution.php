<?php

function countSumOfTwoRepresentations($n, $l, $r)
{
    foreach (range($l, min($n, $r)) as $k) {
        $n - $k <= $r && $n - $k >= $l ? ++$b : '';
    }
    return ceil($b / 2);
}
