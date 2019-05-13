<?php

namespace App\Mapper\Hydrator;

use App\Mapper\PropertyAccessor;
use App\Mapper\Reader\MetadataReader;

class TableHydrator implements Hydrator
{
    use PropertyAccessor;

    /**
     * @var MetadataReader
     */
    private $reader;

    /**
     * @param MetadataReader $reader
     */
    public function __construct(MetadataReader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @param array $row
     * @param string $className
     *
     * @return mixed
     */
    public function hydrate(array $row, string $className)
    {
        $table = $this->createTableForClass($className);
        $entity = new $className;
        foreach ($table->getColumns() as $column) {
            if ($column->getRelatedClass()) {
                $relatedObject = $this->hydrate($row, $column->getRelatedClass());
                $this->setProperty(
                    $entity,
                    $column->getPropertyName(),
                    $relatedObject
                );
            } elseif (isset($row[$table->getName() . $column->getName()])) {
                $this->setProperty(
                    $entity,
                    $column->getPropertyName(),
                    $row[$table->getName() . $column->getName()]
                );
            }
        }

        return $entity;
    }

    /**
     * @param $object
     * @param bool $withRelated
     *
     * @return array
     */
    public function dehydrate($object, bool $withRelated = true): array
    {
        $table = $this->createTableForClass(get_class($object));
        $row = [];
        foreach ($table->getColumns() as $column) {
            $row[$table->getName() . $column->getName()] = null;
            if ($column->getRelatedClass()) {
                $relatedRow = $this->dehydrate($this->getProperty($object, $column->getPropertyName()), $withRelated);
                $row[$table->getName() . $column->getName()] = $relatedRow[$column->getRelatedTable()->getName() . $column->getRelatedTable()->getPrimaryKey()->getName()];
                if ($withRelated) {
                    $row = array_merge($row, $relatedRow);
                }
            } elseif ($this->getProperty($object, $column->getPropertyName())) {
                $row[$table->getName() . $column->getName()] = $this->getProperty($object, $column->getPropertyName());
            }
        }

        return $row;
    }

    private function createTableForClass(string $className)
    {
        return $this->reader->prepareTable($className);
    }
}
