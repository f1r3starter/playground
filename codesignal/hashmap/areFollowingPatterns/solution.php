<?php

function areFollowingPatterns($strings, $patterns)
{
    $v = array_combine($strings, $patterns);
    $d = array_combine($patterns, $strings);
    return array_flip($v) === $d && count(array_flip($v)) == count($v);
}
