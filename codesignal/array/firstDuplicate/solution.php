<?php

function firstDuplicate($a)
{
    $b = array_diff_assoc($a, array_unique($a));
    return empty($b) ? -1 : array_shift($b);
}
