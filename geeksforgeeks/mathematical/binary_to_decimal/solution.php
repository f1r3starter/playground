<?php

function binary2decimal($b)
{
    $num = $exp = 0;
    while ($b > 0) {
        $binNum = $b % 10;
        $b = ($b - $binNum) / 10;
        $num += $binNum * (2 ** $exp);
        ++$exp;
    }
    return (int)$num;
}
