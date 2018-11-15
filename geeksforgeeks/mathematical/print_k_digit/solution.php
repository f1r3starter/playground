<?php

function getKDigit($a, $b, $k) {
    return floor(($a ** $b % 10 ** $k) / 10 ** ($k - 1));
}
