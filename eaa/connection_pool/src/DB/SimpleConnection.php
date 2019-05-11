<?php

namespace App\DB;

use React\MySQL\ConnectionInterface;
use React\MySQL\QueryResult;

class SimpleConnection implements Connection
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function query(string $sql)
    {
        return $this->connection->query($sql)->then(
            function (QueryResult $command) {
                return $command->resultRows;
            }
        );
    }
}
