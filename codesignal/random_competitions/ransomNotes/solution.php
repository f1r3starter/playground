<?php

// Complete the checkMagazine function below.
function checkMagazine($magazine, $note) {
    $magazine = array_count_values($magazine);
    $note = array_count_values($note);
    foreach ($note as $notice => $counter)
    {
        if (!isset($magazine[$notice]) || $magazine[$notice] < $counter) {
            return 'No';
        }
    }

    return 'Yes';
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $mn_temp);
$mn = explode(' ', $mn_temp);

$m = intval($mn[0]);

$n = intval($mn[1]);

fscanf($stdin, "%[^\n]", $magazine_temp);

$magazine = preg_split('/ /', $magazine_temp, -1, PREG_SPLIT_NO_EMPTY);

fscanf($stdin, "%[^\n]", $note_temp);

$note = preg_split('/ /', $note_temp, -1, PREG_SPLIT_NO_EMPTY);

$result = checkMagazine($magazine, $note);
echo $result;
fclose($stdin);
