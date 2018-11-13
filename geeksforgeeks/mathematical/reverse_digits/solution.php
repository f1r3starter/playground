<?php

function reverseDigits(int $n): int {
    $newNumber = 0;
    while ($n > 0) {
        $digit = $n % 10;
        $n = ($n - $digit) / 10;
        $newNumber = $newNumber * 10 + $digit;
    }
    return (int)$newNumber;
}