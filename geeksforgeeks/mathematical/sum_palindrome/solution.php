<?php

function separate($n)
{
    $nums = [];
    while ($n > 0) {
        $num = $n % 10;
        $n = ($n - $num) / 10;
        $nums[] = $num;
    }
    return $nums;
}

function isSumPalindrome($n)
{
    $numSum = separate(array_sum(separate($n)));
    return $numSum === array_reverse($numSum) ? 'YES' : 'NO';
}
