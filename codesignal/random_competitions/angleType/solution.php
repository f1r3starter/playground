<?php

function angleType($m) {
    return $m > 90 && $m < 180 ? 'obtuse' : ($m < 90 ? 'acute' : ($m == 90 ? 'right' : 'straight'));
}
