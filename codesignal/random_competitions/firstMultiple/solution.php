<?php

function firstMultiple($d, $s) {
    for (;;) {
        foreach ($d as $v) {
            if ($s % $v) {
                ++$s;
                continue 2;
            }
        }
        return $s;
    }
}
