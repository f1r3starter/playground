<?php

$handle = fopen("php://stdin", "r");
fscanf($handle, "%d %d", $n, $k);
$a_temp = fgets($handle);
$a = explode(" ", $a_temp);
array_walk($a, 'intval');
$elem = $k % $n;
echo implode(" ", array_merge(array_slice($a, $elem), array_slice($a, 0, $elem)));
