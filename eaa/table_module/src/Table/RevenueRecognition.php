<?php

namespace App\Table;

use DateTime;

class RevenueRecognition extends Table
{
    protected function getTableName(): string
    {
        return 'revenue';
    }

    public function insert(string $contractId, string $revenue, DateTime $dateSigned): void
    {
        $this->pdo->run(
            "INSERT INTO revenue (contract, amount, recognizedOn) VALUES (?, ?, ?)",
            [$contractId, $revenue, $dateSigned]
        )->execute();
    }
}
