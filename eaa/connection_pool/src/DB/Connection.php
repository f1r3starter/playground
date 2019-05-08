<?php


namespace App\DB;

use PDOStatement;

interface Connection
{
    /**
     * @param string $sql
     * @param array|null $args
     *
     * @return bool|false|PDOStatement
     */
    public function run(string $sql, ?array $args);

    public function someLongQuery(): void;
}
