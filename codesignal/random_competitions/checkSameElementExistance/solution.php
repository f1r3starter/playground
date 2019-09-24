<?php

function checkSameElementExistence($a, $b)
{
    return (bool)array_intersect($a, $b);
}
