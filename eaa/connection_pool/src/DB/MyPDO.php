<?php

namespace App\DB;

use PDO;
use PDOStatement;

class MyPDO extends PDO implements Connection
{
    /**
     * MyPDO constructor.
     * @param string|null $dsn
     * @param string|null $username
     * @param string|null $password
     * @param array|null $options
     */
    public function __construct(?string $dsn, ?string $username, ?string $password , ?array $options)
    {
        $defaultOptions = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_replace($defaultOptions, $options ?? []);
        parent::__construct($dsn, $username, $password, $options);
    }

    public function run(string $sql, ?array $args)
    {
        if ($args)
        {
            $stmt = $this->prepare($sql);
            $stmt->execute($args);

            return $stmt;

        }

        return $this->query($sql);
    }

    public function someLongQuery(): void
    {
        sleep(3);
    }
}
