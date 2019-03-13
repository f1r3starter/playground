<?php

function sudoku2($grid)
{
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
            if ($grid[$i][$j] != ".") {
                for ($k = $i + 1; $k < 9; $k++) {
                    if ($grid[$i][$j] == $grid[$k][$j]) {
                        return false;
                    }
                }
                for ($l = $j + 1; $l < 9; $l++) {
                    if ($grid[$i][$j] == $grid[$i][$l]) {
                        return false;
                    }
                }
                $iRange = $i <= 2 ? 0 : ($i - ($i % 3));
                $jRange = $j <= 2 ? 0 : ($j - ($j % 3));
                for ($k = $iRange; $k < $iRange + 3; $k++ ){
                    for ($l = $jRange; $l < $jRange + 3; $l++){
                        if ($grid[$i][$j] == $grid[$k][$l] && $i != $k && $j != $l){
                            return false;
                        }
                    }
                }
            }
        }
    }
    return true;
}
