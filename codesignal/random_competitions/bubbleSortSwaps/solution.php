<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$a_temp = fgets($handle);
$a = explode(" ",$a_temp);
array_walk($a,'intval');
$swaps = 0;
for ($i = 0; $i < $n; $i++){
    for ($j = 0; $j < $n - 1; $j++){
        if ($a[$j] > $a[$j+1]){
            $swap = $a[$j];
            $a[$j] = $a[$j + 1];
            $a[$j + 1] = $swap;
            $swaps++;
        }
    }
}
echo "Array is sorted in $swaps swaps.\r\nFirst Element: $a[0]\r\nLast Element: {$a[$n - 1]}";
