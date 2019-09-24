<?php

function houseNumbersSum($i)
{
    return array_sum(array_splice($i, 0, array_search(0, $i)));
}
