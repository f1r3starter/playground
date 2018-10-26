<?php

interface DumbInterface {}

class DumbClass implements DumbInterface{}

class DumbChildClass extends DumbClass {
    public function __construct($foo, $bar)
    {
    }

    const BAZ = 3;

    public $publicProperty = 'I am public property';
    protected $protectedProperty = 'I am protected property';
    private $privateProperty = 'I am private property';

    /**
     * @param string $name
     * @return string
     */
    private function dumbPrivateFunction(string $name): string
    {
        return "Hi {$name}, I am private function";
    }

    /**
     * @param string $name
     * @return string
     */
    protected function dumbProtectedFunction(string $name): string
    {
        return "Hi {$name}, I am protected function";
    }

    /**
     * @param string $name
     * @return string
     */
    public function dumbPublicFunction(string $name): string
    {
        return "Hi {$name}, I am public function";
    }
}

$reflectionClass = new ReflectionClass(DumbChildClass::class);
var_dump($reflectionClass->getConstructor());
var_dump($reflectionClass->getProperties());
var_dump($reflectionClass->getDefaultProperties());
var_dump($reflectionClass->getConstants());
var_dump($reflectionClass->getInterfaceNames());
var_dump($reflectionClass->getMethods());