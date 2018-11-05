<?php

function printTable($n) {
    foreach (range(1,10) as $i) {
        echo ($i * $n) . ' ';
    }
    echo PHP_EOL;
}