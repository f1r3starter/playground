<?php

function areIsomorphic($a, $b) {
    return count($a) == count($b) && count(array_merge(...$a)) == count(array_merge(...$b));
}
