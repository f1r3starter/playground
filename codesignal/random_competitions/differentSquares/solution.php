<?php

function differentSquares($m)
{
    $r = [];
    for ($i = 1; $i < count($m); $i++)
        for ($j = 1; $j < count($m[$i]); $j++)
            $r[$m[$i - 1][$j - 1] . $m[$i - 1][$j] . $m[$i][$j - 1] . $m[$i][$j]] = true;
    return count($r);
}
