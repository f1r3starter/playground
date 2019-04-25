<?php

namespace App\Mapper\Hydrator;

use App\Mapper\Structure\Table;

class TableHydrator implements Hydrator
{
    /**
     * @var Table
     */
    private $table;

    /**
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    /**
     * @param array  $row
     * @param string $className
     *
     * @return mixed
     */
    public function hydrate(array $row, string $className)
    {
        $entity = new $className;
        foreach ($this->table->getColumns() as $column) {
            if (isset($row[$column->getName()])) {
                $this->setProperty(
                    $entity,
                    $column->getPropertyName(),
                    $row[$column->getName()]
                );
            }
        }

        return $entity;
    }

    /**
     * @param $object
     *
     * @return array
     */
    public function dehydrate($object): array
    {
        $row = [];
        foreach ($this->table->getColumns() as $column) {
            if ($this->getProperty($object, $column->getPropertyName())) {
                $row[$column->getName()] = $this->getProperty($object, $column->getPropertyName());
            }
        }

        return $row;
    }

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
     * @param        $object
     * @param string $attribute
     * @param        $value
     */
    private function setProperty($object, string $attribute, $value): void
    {
        $setter = function($value) use ($attribute) {$this->$attribute = $value;};
        \Closure::bind($setter, $object, get_class($object))($value);
    }
}
