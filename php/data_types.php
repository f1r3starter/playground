<?php

$dataTypes = [
    'int' => 1,
    'double' => 2.3,
    'string' => 'blahblahblah',
    'bool' => true,
    'object' => new stdClass(),
    'array' => [1,2,3],
    'callable' => function () {
        echo 'blah';
    },
    'iterable' => new ArrayIterator([1, 2, 3]),
    'moreIterable' => function () { yield 1 ; },
    'null' => null,
    'resource' => tmpfile()
];

array_walk($dataTypes, function($variable, $typeName) {
    echo sprintf('%s (%s) %s', $typeName, gettype($variable), PHP_EOL);
});
