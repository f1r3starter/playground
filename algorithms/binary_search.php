<?php

$searching = 2;

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 17, 19, 40, 42];

$length = count($array);
$iterations = $position = 0;

while ($length - $position >= 1) {
    ++$iterations;
    $index = (int)(($position + $length) / 2);
    if ($array[$index] === $searching) {
        echo sprintf('Searching index is %d in %d iterations', $index, $iterations); break;
    } elseif ($array[$index] < $searching) {
        $position = $index;
    } else {
        $length = $index;
    }
}

die('Value not found');