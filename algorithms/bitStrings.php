<?php

$stdin = fopen(STDIN);
fscanf($stdin, '%[^\n]', $arr_temp);
[$n, $hasZeros, $hasOnes] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result[0][0] = 0;
while(!feof($stdin)) {
    $line = fgets($stdin);
    $chars = count_chars($line);
    $zeros = $chars[ord('0')] ?? 0;
    $ones = $chars[ord('1')] ?? 0;
    for ($j = $hasZeros; $j >= $zeros; --$j) {
        for ($k = $hasOnes; $k >= $ones; --$k) {
            $result[$j][$k] = max($result[$j][$k] ?? 0, ($result[$j - $zeros][$k - $ones] ?? 0) + 1);
        }
    }
}
fclose($stdin);
$stdout = fopen(getenv('OUTPUT_PATH'), 'wb');
fwrite($stdout, $result[$hasZeros][$hasOnes] - 1);
fclose($stdout);
