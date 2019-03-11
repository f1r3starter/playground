<?php

function rotateImage($a) {
    $length = count($a) - 1;
    $res = [];
    for ($i = 0; $i <= $length; $i++){
        for ($j = $length; $j >= 0; $j--) {
            $res[$i][$length - $j] = $a[$j][$i];
        }
    }
    return $res;
}
