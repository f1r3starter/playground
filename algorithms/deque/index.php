<?php

use App\Deque;

require('./vendor/autoload.php');

// Client code

$deque = new Deque();

foreach (range(0, 666) as $value) {
    $item = new stdClass();
    $item->value = $value;
    $lastItem = new stdClass();
    $lastItem->value = 666 - $value;

    $deque->addFirst($item);
    $deque->addLast($lastItem);
}

assert(1334 === $deque->size());

foreach (range(0, 666) as $value) {
    $head = $deque->removeFirst();
    $tail = $deque->removeLast();
    assert($head->value === 666 - $value);
    assert($tail->value === $value);
}

assert(0 === $deque->size());

$dequeToIterate = new Deque();

foreach (range(0, 666) as $value) {
    $item = new stdClass();
    $item->value = $value;
    $lastItem = new stdClass();
    $lastItem->value = 666 - $value;

    $dequeToIterate->addFirst($item);
    $dequeToIterate->addLast($lastItem);
}

$iterator = $dequeToIterate->iterator();

while ($iterator->valid()) {
    $item = $iterator->current();
    $iterator->next();
}
