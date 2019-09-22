<?php

// Complete the repeatedString function below.
function repeatedString($s, $n) {
    $s = str_split($s);
    $c = array_count_values($s);
    if (!isset($c['a'])) {
        return 0;
    }
    $l = count($s);
    $e = $n % $l > 0 ? array_count_values(array_slice($s, 0, $n % $l)) : 0;
    $e = $e['a'] ?? 0;


    return floor($n / $l) * $c['a'] + $e;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

fscanf($stdin, "%ld\n", $n);

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
