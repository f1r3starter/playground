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
function isListPalindrome($l)
{
    $res = [];
    do {
        $res[] = $l->value;
        $l = $l->next;
    } while ($l !== null);
    return $res === array_reverse($res);
}
