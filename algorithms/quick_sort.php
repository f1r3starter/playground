<?php

function quick_sort($arr)
{
    if (count($arr) < 2) {
        return $arr;
    }
    $pivotNum = $arr[floor(count($arr) / 2)];
    $result = $higher = $lower = [];
    foreach ($arr as $num)
    {
        if ($num > $pivotNum) {
            $higher[] = $num;
        } elseif ($num < $pivotNum) {
            $lower[] = $num;
        } else {
            $result[] = $num;
        }
    }

    return array_merge(quick_sort($lower), $result, quick_sort($higher));
}