<?php

function oddNumbersBeforeZero($s)
{
    $i = 0;
    while ($s[$i])
        $t += $s[$i++] & 1;
    return $t ?? 0;
}
