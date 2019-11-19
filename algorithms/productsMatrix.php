<?php

function calculate(int $n, int $k): int
{
    $min = 1;
    $max = $n ** 2;
    while ($max - $min >= 1) {
        $index = floor($min + ($max - $min) / 2);
        if (checkNumber($index, $n, $k)) {
            $max = $index;
        } else {
            $min = $index + 1;
        }
    }

    return $min;
}

function checkNumber(int $index, int $n, int $k): bool
{
    $counter = 0;
    for ($i = 1; $i <= $n; ++$i) {
        $counter += min(floor($index / $i), $n);
    }

    return $counter >= $k;
}

$stdin = fopen('php://stdin', 'rb');
fscanf($stdin, '%[^\n]', $arr_temp);
$array = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$stdout = fopen(getenv('OUTPUT_PATH'), 'wb');
fwrite($stdout, calculate($array[0], $array[1]));

fclose($stdin);
fclose($stdout);
