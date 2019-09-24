<?php

function firstNotDivisible($d, $s)
{
    while (1) {
        $t = count($d);
        foreach ($d as $v)
            $s % $v ? --$t : '';
        if (!$t)
            return $s;
        ++$s;
    }
}
