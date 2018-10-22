<?php

//private variables are not private if object is initiated inside its class
class Foo {
    private $veryPrivate = 'data';

    public function bar()
    {
        $baz = new self;
        echo $baz->veryPrivate;
    }
}

$foo = new Foo();
$foo->bar();