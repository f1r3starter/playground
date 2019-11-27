<?php

function calculate(array $a, int $n)
{
    $prev = $a[0];
    $current = 0;

    for ($i = 1; $i < $n; ++$i) {
        [$prev, $current] = [$current + $a[$i], max($prev, $current)];
    }

    return max($prev, $current);
}

$n = (int)trim(fgets(STDIN));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

fputs(STDOUT, calculate($a, $n));
