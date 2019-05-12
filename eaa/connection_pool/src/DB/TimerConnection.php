<?php

namespace App\DB;

use React\EventLoop\LoopInterface;
use React\MySQL\ConnectionInterface;
use function React\Promise\Timer\timeout;

class TimerConnection extends SimpleConnection
{
    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @var int
     */
    private $timeout;

    public function __construct(ConnectionInterface $connection, LoopInterface $loop, Retryer $retryer, int $timeout = 3)
    {
        $this->loop = $loop;
        $this->timeout = $timeout;
        parent::__construct($connection, $retryer);
    }

    public function query(string $sql)
    {
        return timeout(parent::query($sql), $this->timeout, $this->loop);
    }
}
