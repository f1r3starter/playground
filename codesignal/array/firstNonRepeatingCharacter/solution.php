<?php

function firstNotRepeatingCharacter($s) {
    $s = str_split($s);
    $un = array_diff($s, array_diff_assoc($s, array_unique($s)));
    return $un ? array_shift($un) : '_';
}
