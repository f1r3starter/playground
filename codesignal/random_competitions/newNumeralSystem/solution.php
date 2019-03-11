<?php

function newNumeralSystem($n) {
    $n = ord($n);
    $r = [];
    while ($l <= ($n-65) / 2)
        $r[] = chr($l + 65) . ' + ' . chr($n - $l++);

    return $r;
}
