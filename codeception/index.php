<?php

require('vendor/autoload.php');

$expected = \Codeception\Stub\Expected::once('test');
$matcher = $expected->getMatcher();

$stub = \Codeception\Stub::make(\App\DumbClass::class, [
    'add' => $expected
]);
