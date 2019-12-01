<?php

function isCryptSolution($crypt, $solution)
{
    foreach ($solution as $sub) {
        $crypt[0] = str_replace($sub[0], $sub[1], $crypt[0]);
        $crypt[1] = str_replace($sub[0], $sub[1], $crypt[1]);
        $crypt[2] = str_replace($sub[0], $sub[1], $crypt[2]);
        if ((strpos($crypt[0], '0') === 0 && strlen($crypt[0]) > 1) || (strpos($crypt[1], '0') === 0 && strlen($crypt[1]) > 1) || (strpos($crypt[2], '0') === 0 && strlen($crypt[2]) > 1)) {
            return false;
        }
    }
    if ((int)$crypt[0] + (int)$crypt[1] === (int)$crypt[2]) {
        return true;
    } else {
        return false;
    }
}
