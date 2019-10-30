<?php

function bubbleSort(array $arr): array
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - 1; $j++) {

            if ($arr[$j] > $arr[$j + 1]) {

                list(&$arr[$j], &$arr[$j + 1]) = [$arr[$j + 1], $arr[$j]];

            }
        }
    }
    return $arr;
}
