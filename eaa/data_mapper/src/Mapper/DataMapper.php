<?php

namespace App\Mapper;

use App\DB\MyPDO;
use App\Mapper\Hydrator\Hydrator;
use App\Mapper\Hydrator\TableHydrator;
use App\Mapper\Reader\AnnotationReader;
use App\Mapper\Reader\MetadataReader;
use App\Mapper\Structure\Table;

class DataMapper
{
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

    public function __construct(
        string $className,
        MyPDO $pdo,
        MetadataReader $metadataReader = null,
        Hydrator $hydrator = null
    ) {
        $this->className = $className;
        $this->pdo = $pdo;
        $this->table = $metadataReader
            ? $metadataReader->prepareTable($className)
            : (new AnnotationReader())->prepareTable($className);
        $this->hydrator = $hydrator ?? new TableHydrator($this->table);
    }

    public function find($identity)
    {

    }

    public function save($entity)
    {

    }

    public function delete($entity)
    {

    }
}
