<?php

function sameElementsNaive(...$a) {
    return count(array_intersect(...$a));
}
