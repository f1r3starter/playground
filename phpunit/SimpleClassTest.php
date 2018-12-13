<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2018-12-13
 * Time: 23:13
 */
use Application\DumbClass;
use Application\SimpleClass;

class SimpleClassTest extends \PHPUnit\Framework\TestCase
{
    public function testAdd()
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
}
