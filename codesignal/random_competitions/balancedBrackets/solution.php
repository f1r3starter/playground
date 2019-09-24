<?php

// Complete the isBalanced function below.
function isBalanced($s)
{
    $s = str_split($s);
    $t = [];
    foreach ($s as $l) {
        if (in_array($l, ['[', '(', '{'])) {
            $t[] = $l;
        } else {
            $m = array_pop($t);
            if (($m === '[' && $l === ']')
                || ($m === '{' && $l === '}')
                || ($m === '(' && $l === ')')) {
                continue;
            }

            return 'NO';
        }
    }

    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);

    $result = isBalanced($s);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
