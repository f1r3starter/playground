<?php

use App\RandomizedQueue;

require('vendor/autoload.php');

$queue = new RandomizedQueue();

foreach (range(1, 100000) as $num) {
    $item = new stdClass();
    $item->value = $num;
    $queue->enqueue($item);
}

$randomItem = $queue->sample();

echo "Sample value is {$randomItem->value}";
assert($randomItem->value !== 1); // Well, there is a small probability of getting 1

$firstIterator = $queue->iterator();
$secondIterator = $queue->iterator();

while ($firstIterator->valid() && $secondIterator->valid()) {
    if ($firstIterator->current()->value === $secondIterator->current()->value) {
        echo "What a surprise, same elements on {$firstIterator->key()} index";
        break;
    }
    $firstIterator->next();
    $secondIterator->next();
}
