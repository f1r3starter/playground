<?php

namespace App\Mapper;

trait PropertyAccessor
{
    /**
     * @param $object
     * @param $attribute
     *
     * @return mixed
     */
    private function getProperty($object, $attribute)
    {
        $getter = function() use ($attribute) {return $this->$attribute;};

        return \Closure::bind($getter, $object, get_class($object))();
    }

    /**
     * @param $object
     * @param string $attribute
     * @param $value
     */
    private function setProperty($object, string $attribute, $value): void
    {
        $setter = function($value) use ($attribute) {$this->$attribute = $value;};
        \Closure::bind($setter, $object, get_class($object))($value);
    }
}
