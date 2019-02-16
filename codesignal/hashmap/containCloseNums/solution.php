<?php

function containsCloseNums($nums, $k) {
    $vals = $res = [];
    foreach ($nums as $ke => $v) {
        if (isset($vals[$v]) && !$res[$v]) {
            $res[$v] = $ke - $vals[$v] <= $k;
        }
        $vals[$v] = $ke;
    }
    return (bool)min($res);
}
