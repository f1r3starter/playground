<?php

function factorial(int $num): int
{
    return $num > 1 ? $num * factorial($num - 1) : 1;
}