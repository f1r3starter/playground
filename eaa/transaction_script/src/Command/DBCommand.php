<?php

namespace App\Command;

use App\DB\MyPDO;

abstract class DBCommand
{
    /**
     * @var MyPDO
     */
    protected $pdo;

    public function __construct(MyPDO $pdo)
    {
        $this->pdo = $pdo;
    }
}
