<?php


namespace App\DB;


class ConnectionPool
{
    /**
     * @var MyPDO[]
     */
    private $available = [];

    /**
     * @var MyPDO[]
     */
    private $busy = [];

    /**
     * @var string|null
     */
    private $dsn;

    /**
     * @var string|null
     */
    private $username;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @var array|null
     */
    private $options;

    public function __construct(?string $dsn = null, ?string $username = null, ?string $password = null, ?array $options = null)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

    public function getConnection(): Connection
    {
        if (empty($this->available)) {
            $connection = new MyPDO($this->dsn, $this->username, $this->password, $this->options);
            $this->busy[] = $connection;
        } else {
            $connection = array_pop($this->available);
        }

        return $connection;
    }

    public function closeConnection(Connection $connection): void
    {
        if (in_array($connection, $this->busy)) {
            unset($this->busy[array_search($connection, $this->busy)]);
        } else {
            throw new \InvalidArgumentException('There are no such connection in this pool');
        }
        $this->available[] = $connection;
    }

    public function countConnections()
    {
        return sprintf('Currently there are %s busy, %s available connections', count($this->busy), count($this->available));
    }
}
