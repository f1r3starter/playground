<?php

$searching = 17;

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 19, 40, 42];

$right = count($array);
$iterations = 0;
$left = 0;

while ($right - $left >= 1) {
    ++$iterations;
    $index = (int)(($left + $right) / 2);
    if ($array[$index] === $searching) {
        die(sprintf('Searching index is %d in %d iterations', $index, $iterations));
    }

    if ($array[$index] < $searching) {
        $left = $index;
    } else {
        $right = $index;
    }
}

die('Value not found');
