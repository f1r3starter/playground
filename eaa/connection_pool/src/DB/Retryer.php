<?php

namespace App\DB;

interface Retryer
{
    public function attempt(Connection $connection, string $sql);
}
