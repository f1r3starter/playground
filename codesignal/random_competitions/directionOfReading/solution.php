<?php

function directionOfReading($n) {
    $l = count($n);
    foreach ($n as $v) {
        $t[] = str_split(sprintf("%0{$l}d", $v));
    }
    foreach ($n as $i => $v) {
        $r[] = (int)join('', array_column($t, $i));
    }
    return $r;
}
