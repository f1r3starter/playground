<?php

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
    $r = 0;
    for ($i = 0; $i < count($c); $i++) {
        isset($c[$i+2]) && $c[$i+2] === 0 ? $i++ : '';
        $r++;
    }
    return $r - 1;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = jumpingOnClouds($c);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
