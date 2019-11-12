<?php

// Complete the closestNumbers function below.
function closestNumbers($arr, $n)
{
    quicksort($arr, 0, $n - 1);
    $res = [];
    $minDiff = PHP_INT_MAX;
    $last = $arr[0];
    for ($i = 1; $i < $n; ++$i) {
        $current = $arr[$i];
        if ($current - $last < $minDiff) {
            $res = [$last, $current];
            $minDiff = $current - $last;
        } elseif ($current - $last === $minDiff) {
            $res[] = $last;
            $res[] = $current;
        }
        $last = $current;
    }

    return $res;
}

function quicksort(&$a, $l, $r)
{
    if ($l < $r) {
        $q = partition($a, $l, $r);
        quicksort($a, $l, $q);
        quicksort($a, $q + 1, $r);
    }
}

function partition(&$a, $l, $r)
{
    $v = $a[random_int($l, $r)];
    $i = $l;
    $j = $r;
    while ($i <= $j) {
        while ($a[$i] < $v) $i++;
        while ($a[$j] > $v) $j--;
        if ($i <= $j) {
            [$a[$i], $a[$j]] = [$a[$j], $a[$i]];
            ++$i;
            --$j;
        }
    }

    return $j;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = closestNumbers($arr, $n);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($stdin);
fclose($fptr);
