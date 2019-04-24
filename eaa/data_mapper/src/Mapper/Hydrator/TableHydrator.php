<?php

namespace App\Mapper\Hydrator;

use App\Mapper\Structure\Table;

class TableHydrator implements Hydrator
{
    /**
     * @var Table
     */
    private $table;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

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

    public function dehydrate($object): array
    {
        return [];
    }

    private function getProperty($object, $attribute) {
        $getter = function() use ($attribute) {return $this->$attribute;};
        return \Closure::bind($getter, $object, get_class($object))();
    }

    private function setProperty($object, string $attribute, $value)
    {
        $setter = function($value) use ($attribute) {$this->$attribute = $value;};
        \Closure::bind($setter, $object, get_class($object))($value);
    }
}
