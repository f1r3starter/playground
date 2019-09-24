<?php

function easyAssignmentProblem($s)
{
    [[$n, $m], [$d, $t]] = $s;
    return $n - $m > $d - $t ? [1, 2] : [2, 1];
}
