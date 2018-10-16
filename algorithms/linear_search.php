<?php

$searching = 3;

$array = [4, 5, 7, 2, 6, 8, 3, 1];

foreach ($array as $key => $element) {
    if ($element === $searching) {
        die(sprintf('Key of the searching element is %d', $key));
    }
}