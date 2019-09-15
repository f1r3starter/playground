<?php

function removeDuplicateCharacters($s)
{
    return implode('', array_keys(
        array_filter(
            count_chars($s),
            function ($v) {
                return $v === 1;
            }
        )
    ));
}
