<?php

function digitDegree($n, $k = 0)
{
    return $n > 9 ? digitDegree(array_sum(str_split($n)), ++$k) : $k;
}
