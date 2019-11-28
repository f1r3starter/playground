<?php

function bubbleSort(array $arr): array
{
    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        for ($j = 0; $j < count($arr) - 1; $j++) {

            if ($arr[$j] > $arr[$j + 1]) {

                list(&$arr[$j], &$arr[$j + 1]) = [$arr[$j + 1], $arr[$j]];

            }
        }
    }
    return $arr;
}
