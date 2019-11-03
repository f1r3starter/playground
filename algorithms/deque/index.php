<?php

use App\Deque;

require('./vendor/autoload.php');

// Client code

$deque = new Deque();

foreach (range(1, 666) as $value) {
    $item = new stdClass();
    $item->value = $value;
    $lastItem = new stdClass();
    $lastItem->value = 666 - $value;

    $deque->addFirst($item);
    $deque->addLast($lastItem);
}

assert(666 * 2 === $deque->size());

foreach (range(1, 666) as $value) {
    $head = $deque->removeFirst();
    $tail = $deque->removeLast();
    assert($head->value === $value, $head->value . " " . $value);
    assert($tail->value === 666 - $value);
}

