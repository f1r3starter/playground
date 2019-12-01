<?php

function rearrangeLastN($l, $n)
{
    $a = [];
    while ($l != null) {
        $a[] = $l->value;
        $l = $l->next;
    }
    $b = array_splice($a, -$n);
    return array_merge($b, $a);
}
