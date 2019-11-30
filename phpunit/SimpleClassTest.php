<?php

use Application\DumbClass;
use Application\SimpleClass;
use PHPUnit\Framework\TestCase;

class SimpleClassTest extends TestCase
{
    public function testAdd(): void
    {
        $dumbClass = $this->getMockBuilder(DumbClass::class)
            ->setMethods(['add'])
            ->getMock();
        /**
         * @var DumbClass $dumbClass
         */
        $dumbClass->expects($this->once())
            ->method('add')
            ->with($this->equalTo(2), $this->equalTo(3));
        $simpleClass = new SimpleClass($dumbClass);
        $simpleClass->add(2,3);
    }

    public function testProphecy(): void
    {
        $dumbClass = $this->prophesize(DumbClass::class);

        $dumbClass->add(2,3)->shouldBeCalled();

        $simpleClass = new SimpleClass($dumbClass->reveal());
        $simpleClass->add(2,3);
    }
}
