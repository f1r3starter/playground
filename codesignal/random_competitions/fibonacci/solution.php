<?php
$handle = fopen('php://stdin', 'rb');

function fibonacci($n)
{
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

$n = fgets($handle);

printf('%d', fibonacci($n));

fclose($handle);

