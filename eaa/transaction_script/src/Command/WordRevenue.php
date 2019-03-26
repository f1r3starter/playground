<?php

namespace App\Command;

class WordRevenue extends UpdateCommand
{
    public function execute(array $contract): void
    {
        $this->pdo->run(
            "INSERT INTO revenue (contract, amount, recognizedOn) VALUES (?, ?, ?)",
            [$contract['id'], $contract['revenue'], $contract['dateSigned']]
        )->execute();
    }
}
