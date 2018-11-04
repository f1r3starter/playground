<?php

function printPat(int $n) {
    $result = '';
    for ($i = $n; $i > 0; $i--) {
        for ($j = $n; $j > 0; $j--) {
            $result .= str_repeat($j . " ", $i);
        }
        $result .= '$';
    }
    return $result;
}

echo printPat(2) . PHP_EOL;
echo printPat(3) . PHP_EOL;
echo printPat(1) . PHP_EOL;
