<?php

function alphabeticShift($i) {
    return array_reduce(str_split($i), function($w, $l) {
        $l = chr(ord($l)+1);
        return $w . ($l === '{' ? 'a' : $l);
    });
}
