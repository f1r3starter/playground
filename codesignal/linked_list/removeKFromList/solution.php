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
function removeKFromList($l, $k)
{
    $res = [];
    while ($l !== null) {
        if ($l->value !== $k) {
            $res[] = $l->value;
        }
        $l = $l->next;
    }
    return $res;
}
