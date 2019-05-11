<?php

namespace App\DB;

use React\EventLoop\LoopInterface;
use React\MySQL\Factory;
use SplObjectStorage;

class ConnectionPool
{
    /**
     * @var SplObjectStorage|MyPDO[]
     */
    private $available;

    /**
     * @var SplObjectStorage|MyPDO[]
     */
    private $busy;

    /**
     * @var string
     */
    private $connectionUri;

    /**
     * @var Factory
     */
    private $factory;

    /**
     * @var LoopInterface
     */
    private $loop;

    public function __construct(LoopInterface $loop, string $connectionUri)
    {
        $this->connectionUri = $connectionUri;
        $this->available = new SplObjectStorage();
        $this->busy = new SplObjectStorage();
        $this->factory = new Factory($loop);
        $this->loop = $loop;
    }

    public function getConnection(bool $withTimeout = false): Connection
    {
        if ($this->available->count() > 0) {
            $this->available->rewind();
            $connection = $this->available->current();
            $this->available->detach($connection);
        } else {
            $lazyConnection = $this->factory->createLazyConnection($this->connectionUri);
            $connection = $withTimeout ?
                new TimerConnection($lazyConnection, $this->loop) :
                new SimpleConnection($lazyConnection);
        }
        $this->busy->attach($connection);

        return $connection;
    }

    public function closeConnection(Connection $connection): void
    {
        if ($this->busy->contains($connection)) {
            $this->busy->detach($connection);
        } else {
            throw new \InvalidArgumentException('There are no such connection in this pool');
        }
        $this->available->attach($connection);
    }

    public function countConnections()
    {
        return sprintf('Currently there are %s busy, %s available connections', $this->busy->count(), $this->available->count());
    }
}
