<?php

namespace App\DB;

use Exception;
use React\MySQL\ConnectionInterface;
use React\MySQL\QueryResult;

class SimpleConnection implements Connection
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * @var Retryer
     */
    private $retryer;

    public function __construct(ConnectionInterface $connection, Retryer $retryer)
    {
        $this->connection = $connection;
        $this->retryer = $retryer;
    }

    public function query(string $sql)
    {
        return $this->connection->query($sql)->then(
            function (QueryResult $command) {
                return $command->resultRows;
            },
            function (Exception $exception) use ($sql) {
                return $this->retryer->attempt($this, $sql);
            }
        );
    }
}
