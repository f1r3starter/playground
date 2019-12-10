<?php

namespace App\DB;

use RuntimeException;

class QueryRetryer implements Retryer
{
    /**
     * @var int
     */
    private $maxTries;

    /**
     * @var int
     */
    private $tries = 0;

    public function __construct(int $maxTries = 3)
    {
        $this->maxTries = $maxTries;
    }

    public function attempt(Connection $connection, string $sql)
    {
        if ($this->tries < $this->maxTries) {
            ++$this->tries;
            return $connection->query($sql);
        } else {
            throw new RuntimeException('Cannot proceed query, max tries limit has been hit');
        }
    }
}
