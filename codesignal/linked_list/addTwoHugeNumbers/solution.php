<?php

// Definition for singly-linked list:
// class ListNode {
//   public $value;
//   public $next;
//
//   public function __construct($x) {
//     $this->value = $x;
//     $this->next = null;
//   }
// }
//
function addTwoHugeNumbers($a, $b)
{
    $con = true;
    $res = $res2 = [];
    while ($con) {
        if ($a) {
            array_unshift($res, $a->value);
            $a = $a->next;
        }
        if ($b) {
            array_unshift($res2, $b->value);
            $b = $b->next;
        }
        if (!$a && !$b) {
            $con = false;
        }
    }
    if (count($res) < count($res2)) {
        $mid = $res2;
        $res2 = $res;
        $res = $mid;
    }
    $end = [];
    for ($i = 0, $iMax = count($res); $i < $iMax; $i++) {
        $sum = (isset($res2[$i])) ? ((int)$res[$i] + (int)$res2[$i]) : $res[$i];
        if (strlen($sum) > 4 && isset($res[$i + 1])) {
            $res[$i + 1] += floor($sum / 10000);
            $end[] = $sum % 10000;
        } elseif (strlen($sum) > 4 && !isset($res[$i + 1])) {
            $end[] = $sum % 10000;
            $end[] = floor($sum / 10000);
        } else {
            $end[] = $sum;
        }
    }
    return array_reverse($end);
}
