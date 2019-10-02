<?php

function longestUncorruptedSegment($s, $d) {
    $k = $i = 0;
    $r = [0, 0];
    do {

        if ($s[$i] === $d[$i]) {
            ++$k;
        } else {
            $k = 0;
        }
        if ($k > $r[0]) {
            $r = [$k, $i - $k + 1];
        }
        ++$i;
    } while ($i < count($s));

    return $r;
}
