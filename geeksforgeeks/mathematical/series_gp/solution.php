<?php

function seriesGP($a, $b, $n) {
    switch ($n) {
        case 1:
            return $a;
        case 2:
            return $b;
        default:
            return floor($b * (($b / $a) ** ($n - 2)));
    }
}