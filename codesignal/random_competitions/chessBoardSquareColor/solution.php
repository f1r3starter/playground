<?php

function chessBoardCellColor($cell1, $cell2)
{
    return (ord($cell1[0]) + $cell1[1]) % 2 == (ord($cell2[0]) + $cell2[1]) % 2;
}
