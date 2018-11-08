<?php

function closestDiviser($n, $m)
{
    $result = 0;
    for ($i = $n; $i < $n + abs($m); $i++) {
        if ($i % $n == 0) {
            $result = $i;
            break;
        }
    }

    for ($i = $n; $i < $n - abs($m); $i--) {
        if ($i % $m == 0 and
            (abs(abs($i) - abs($n)) < abs(abs($result) - abs($n))
                or (abs(abs($i) - abs($n)) == abs(abs($result) - abs($n)) and abs($i) > abs($result)))) {
            $result = $i;
            break;
        }

    }
    return $result;
}