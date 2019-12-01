<?php

function reverseNodesInKGroups($l, $k)
{
    $r = $s = [];
    do {
        $s[] = $l->value;
        if (count($s) === $k) {
            $r = array_merge($r, array_reverse($s));
            $s = [];
        } elseif ($l->next === null) {
            $r = array_merge($r, $s);
        }
        $l = $l->next;
    } while ($l !== null);
    return $r;
}
