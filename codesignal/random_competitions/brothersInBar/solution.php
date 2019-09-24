<?php

function brothersInTheBar($glasses)
{
    $i = 1;
    $r = 0;
    $s[] = [$glasses[0], 1];
    while ($i < count($glasses)) {
        $l = array_pop($s);
        if ($l && $l[0] == $glasses[$i]) {
            ++$l[1];
            if ($l[1] == 3) {
                ++$r;
                ++$i;
                continue;
            }
        } else {
            $s[] = $l;
            $l = [$glasses[$i], 1];
        }
        $s[] = $l;
        ++$i;
    }
    return $r;
}
