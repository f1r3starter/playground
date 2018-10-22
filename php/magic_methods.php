<?php

class Magician {

    private $isReal = 'very real';
    public $born = 'toBeRemoved';

    public function getIsReal()
    {
        return $this->isReal . PHP_EOL;
    }

    public function __construct()
    {
        echo __CLASS__ . ' instance created' . PHP_EOL;
    }

    public function __destruct()
    {
        echo __CLASS__ . ' instance removed' . PHP_EOL;
    }

    public function __call($name, $arguments)
    {
        echo $name . ' called as method with arguments' . json_encode($arguments) . PHP_EOL;
    }

    public function __clone()
    {
        $this->isReal = 'naaah, just a clone';
    }

    public function __get($name)
    {
        echo 'Trying to get ' . $name . PHP_EOL;
    }

    public function __set($name, $value)
    {
        echo 'Trying to set ' . $name . ' value ' . $value . PHP_EOL;
    }

    public function __invoke($args)
    {
        echo 'Wow, somebody called me as a method with params ' . json_encode($args) . PHP_EOL;
    }

    public function __isset($name)
    {
        echo "Do we have a property {$name}?" . PHP_EOL;
    }

    public function __unset($name)
    {
        echo "Hey, don\'t remove {$name} property, I need it!" . PHP_EOL;
    }

    public function __sleep()
    {
        echo 'Oh no, somebody serialized me' . PHP_EOL;
    }

    public function __wakeup()
    {
        echo 'Great, I am unserialized again' . PHP_EOL;
    }

    public function __toString()
    {
        return 'I am an object, not a string!' . PHP_EOL;
    }

    public function __debugInfo()
    {
        return ['What did you expect to see here?'];
    }
}

$magician = new Magician();
$magician->showTrick('rabbitOne', 'rabbitTwo');
echo $magician->getIsReal();
$magician2 = clone $magician;
echo $magician2->getIsReal();
$magician->rabbit;
$magician->hat = 'Has rabbit';
$magician('Do a barrel roll', 'please');
isset($magician->tricks);
unset($magician->grumpyFace);
$serializedMagician = serialize($magician);
unserialize($serializedMagician);
echo $magician;
var_dump($magician);
unset($magician);



class A {
    public $a = 0;
    protected $b = 1;
    private $c = 2;

    public function __set($name, $value)
    {
        echo $name , ' = ' , $value;
    }
}

$a = new A;
$a->a = 5;
$a->b = 10;
$a->c = 15;
$a->d = 20;