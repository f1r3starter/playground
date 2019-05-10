<?php

namespace App\DB;

interface Connection
{
    /**
     * @param string $sql
     */
    public function query(string $sql);
}
