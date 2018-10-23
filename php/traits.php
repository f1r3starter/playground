<?php

class Foo {
    use Baz;

    public function doSomething()
    {
        echo 'I am a class function' . PHP_EOL;
    }
}

trait Baz {
    public function doSomething()
    {
        echo 'I am a trait function' . PHP_EOL;
    }
}

class FooChild extends Foo {
    use Baz;
}

// trait has less priority than class function
$foo = new Foo();
$foo->doSomething();

// but in child class trait overrides parents method
$fooChild = new FooChild();
$fooChild->doSomething();