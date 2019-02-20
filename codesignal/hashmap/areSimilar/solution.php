<?php

function areSimilar($a, $b) {
    return !array_diff($a, $b)
        && count(array_diff_assoc($a, $b)) < 3
        && array_sum($a) === array_sum($b);
}
