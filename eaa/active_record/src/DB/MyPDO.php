<?php

namespace App\DB;

use PDO;
use PDOStatement;

class MyPDO extends PDO
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

    /**
     * @param string $sql
     * @param array|null $args
     *
     * @return bool|false|PDOStatement
     */
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
}
