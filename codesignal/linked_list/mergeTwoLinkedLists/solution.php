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
function mergeTwoLinkedLists($l1, $l2) {
    $result = [];
    while (true) {
        if ($l1 && $l2) {
            if ($l1->value > $l2->value) {
                $result[] = $l2->value;
                $result[] = $l1->value;
            } else {
                $result[] = $l1->value;
                $result[] = $l2->value;
            }
            $l1 = $l1->next;
            $l2 = $l2->next;
        } elseif ($l1 && !$l2) {
            $result[] = $l1->value;
            $l1 = $l1->next;
        } elseif ($l2 && !$l1) {
            $result[] = $l2->value;
            $l2 = $l2->next;
        } else {
            break;
        }
    }
    sort($result);
    return $result;
}
