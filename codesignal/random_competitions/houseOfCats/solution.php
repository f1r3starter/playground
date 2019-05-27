<?php

function houseOfCats($l) {
    $r = [];
    while ($l >= 0) {
        array_unshift($r, $l / 2);
        $l-=4;
    }
    return $r;
}
