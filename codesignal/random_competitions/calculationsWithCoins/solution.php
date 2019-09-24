<?php

function calculationsWithCoins($a, $b, $c)
{
    return count(array_unique([$a, $b, $c, $a + $b, $a + $c, $b + $c, $a + $b + $c]));
}
