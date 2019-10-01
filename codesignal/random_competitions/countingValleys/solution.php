<?php

// Complete the countingValleys function below.
function countingValleys($n, $s) {
    $h = str_split($s);
    $r = $v = 0;
    foreach ($h as $i => $a)
    {
        $a === 'D' ? --$r : ++$r;
        if ($r === 0 && $a === 'U') {
            ++$v;
        }
    }
    return $v;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

$s = '';
fscanf($stdin, "%[^\n]", $s);

$result = countingValleys($n, $s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
