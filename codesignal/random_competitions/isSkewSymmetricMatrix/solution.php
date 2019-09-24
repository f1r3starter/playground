<?php

function isSkewSymmetricMatrix($m)
{
    foreach ($m as $i => $r) {
        foreach ($r as $j => $c) {
            if ($m[$i][$j] != -$m[$j][$i]) {
                return false;
            }
        }
    }

    return true;
}
