<?php

function isEarlier($t, $z)
{
    return $t[0] * 60 + $t[1] < $z[0] * 60 + $z[1];
}
