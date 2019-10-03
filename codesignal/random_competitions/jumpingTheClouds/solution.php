<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c, $n) {
    $r = 0;
    for ($i = 0; $i < $n; $i++) {
        isset($c[$i+2]) && $c[$i+2] === 0 ? $i++ : '';
        $r++;
    }
    return $r - 1;
}

$fptr = fopen(getenv('OUTPUT_PATH'), 'wb');

$stdin = fopen('php://stdin', 'rb');

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c, $n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
