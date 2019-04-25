<?php

namespace App\Mapper;

use App\DB\MyPDO;
use App\Mapper\Hydrator\Hydrator;
use App\Mapper\Hydrator\TableHydrator;
use App\Mapper\Reader\AnnotationReader;
use App\Mapper\Reader\MetadataReader;
use App\Mapper\Structure\Table;
use App\Mapper\Query\MysqlStatementBuilder;
use App\Mapper\Query\StatementBuilder;
use DomainException;
use PDO;

class DataMapper
{
    use ProperyAccessor;

    /**
     * @var string
     */
    private $className;

    /**
     * @var MyPDO
     */
    private $pdo;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @var Table
     */
    private $table;

    /**
     * @var StatementBuilder
     */
    private $statementBuilder;

    public function __construct(
        string $className,
        MyPDO $pdo,
        MetadataReader $metadataReader = null,
        Hydrator $hydrator = null,
        StatementBuilder $statementBuilder = null
    ) {
        $metadataReader = $metadataReader ?? new AnnotationReader();
        $this->className = $className;
        $this->pdo = $pdo;
        $this->table = $metadataReader->prepareTable($className);
        $this->hydrator = $hydrator ?? new TableHydrator($metadataReader);
        $this->statementBuilder = $statementBuilder ?? new MysqlStatementBuilder($this->table);
    }

    public function find($identity)
    {
        $row = $this->pdo->run(
            $this->statementBuilder->find(),
            [$identity]
        )->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new DomainException(sprintf('Entity of class %s with identity %s not found', $this->className, $identity));
        }

        return $this->hydrator->hydrate($row, $this->className);
    }

    public function save($entity)
    {
        $values = $this->hydrator->dehydrate($entity);
        if ($identity = $this->getProperty($entity, $this->table->getPrimaryKey()->getPropertyName())) {
            $values[] = $identity;
            $query = $this->statementBuilder->update();
        } else {
            $query = $this->statementBuilder->insert();
        }

        $this->pdo->prepare(
            $query
        )->execute(array_values($values));

        $this->setProperty($entity, $this->table->getPrimaryKey()->getPropertyName(), $this->pdo->lastInsertId());

        return $entity;
    }

    public function delete($entity)
    {
        $identity = $this->getProperty($entity, $this->table->getPrimaryKey()->getPropertyName());

        $this->pdo->prepare(
            $this->statementBuilder->delete()
        )->execute($identity);
    }
}
