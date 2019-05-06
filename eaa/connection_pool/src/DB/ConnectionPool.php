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

    public function getConnection(): MyPDO
    {
        if (empty($this->available)) {
            $connection = new MyPDO($this->dsn, $this->username, $this->password, $this->options);
            $this->busy[] = $connection;
        } else {
            $connection = array_pop($this->available);
        }

        return $connection;
    }

    public function closeConnection(MyPDO $PDO): void
    {
        if (in_array($PDO, $this->busy)) {
            unset($this->busy[array_search($PDO, $this->busy)]);
        }
        $this->available[] = $PDO;
    }
}
