<?php

require('vendor/autoload.php');

$stub = \Codeception\Stub::make(\App\DumbClass::class, [
    'add' => \Codeception\Stub\Expected::once()->getMatcher()->invoked()
]);
