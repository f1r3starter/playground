<?php
$_fp = fopen('php://stdin', 'rb');
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$stdin = fopen('php://stdin', 'rb');
$stdout = fopen(getenv('OUTPUT_PATH'), 'wb');
fscanf($stdin, '%d\n', $n);

fscanf($stdin, '%[^\n]', $arr_temp);
$my = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

fscanf($stdin, '%[^\n]', $arr_temp);
$enemy = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
rsort($my);
rsort($enemy);
$res = 0;
foreach ($enemy as $index => $value) {
    $myValue = array_shift($my);
    if ($myValue > $value) {
        $res += $myValue;
    } else {
        array_unshift($my, $myValue);
        $myValue = array_pop($my);
        if ($myValue > $value) {
            $res += $myValue;
        }
    }
}

fwrite($stdout, $res);
fclose($stdout);
