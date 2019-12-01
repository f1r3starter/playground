<?php

function climbingStairs($n)
{
    $num2 = 1;
    $num = 0;
    for ($i = 0; $i <= $n; $i++) {
        [$num, $num2] = [$num2, $num + $num2];
    }

    return $num;
}
