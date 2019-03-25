<?php

//
// Definition for binary tree:
// class Tree {
//   public $value;
//   public $left;
//   public $right;
//
//   public function __construct($x) {
//     $this->value = $x;
//     $this->left = null;
//     $this->right = null;
//   }
// }
function hasPathWithGivenSum($t, $s) {
    if ($t === null) {
        return $s === 0;
    } else {
        $n = $s - $t->value;
        if ($t->left == null && $t->right == null) {
            return $n === 0;
        }

        if ($t->left) {
            $l = hasPathWithGivenSum($t->left, $n);
        }

        if ($t->right) {
            $r = hasPathWithGivenSum($t->right, $n);
        }

        return $l ?: ($r ?: false);
    }
}

