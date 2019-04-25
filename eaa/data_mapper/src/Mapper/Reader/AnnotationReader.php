<?php

namespace App\Mapper\Reader;

use App\Mapper\Structure\Table;
use App\Mapper\Structure\Column;

class AnnotationReader implements MetadataReader
{
    private const COLUMN_CONVENTION = 'Column';
    private const TABLE_CONVENTION = 'Table';
    private const BLOCK_PATTERN = '/(?>\@%s\()?(?:(?<key>[^=,(\s]+)=(?<value>[^,|\)\s]+))+/';

    /**
     * @param string $className
     *
     * @return Table
     * @throws \ReflectionException
     */
    public function prepareTable(string $className): Table
    {
        if (!class_exists($className)) {
            throw new \InvalidArgumentException(sprintf('Class %s does not exists', $className));
        }

        $class = new \ReflectionClass($className);
        $tableParams = $this->parseDocBlock($class->getDocComment(), self::TABLE_CONVENTION);

        if (!isset($tableParams['name'])) {
            throw new \ParseError(sprintf('Table name annotation for class %s is required', $className));
        }

        $table = new Table($tableParams['name']);

        foreach ($class->getProperties() as $property) {
            $columnParams = $this->parseDocBlock($property->getDocComment(), self::COLUMN_CONVENTION);
            if (!isset($columnParams['name'])) {
                throw new \ParseError(sprintf('Table name for property %s in class %s is required', $property->getName(), $className));
            }

            $relatedClass = $columnParams['relatedClass'] ?? null;
            $table->addColumn(
                new Column(
                    $columnParams['name'],
                    $property->getName(),
                    isset($columnParams['primary']),
                    $relatedClass,
                    $relatedClass ? $this->prepareTable($relatedClass) : null
                )
            );
        }

        return $table;
    }

    /**
     * @param string $docBlock
     * @param string $context
     *
     * @return array
     */
    private function parseDocBlock(string $docBlock, string $context): array
    {
        preg_match_all(sprintf(self::BLOCK_PATTERN, $context), $docBlock, $docParams, PREG_SET_ORDER, 0);

        return array_column($docParams, 'value', 'key');
    }
}
