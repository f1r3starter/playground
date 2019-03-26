<?php

namespace App\Command;

class SpreadsheetRevenue extends UpdateCommand
{
    public function execute(array $contract): void
    {
        $this->pdo->prepare(
            "INSERT INTO revenue (contract, amount, recognizedOn) VALUES 
                  (:contractId, :amount, :dateSigned),
                  (:contractId, :amount, DATE_ADD(:dateSigned, INTERVAL 60 DAYS)),
                  (:contractId, :amount, DATE_ADD(:dateSigned, INTERVAL 90 DAYS)) "
        )->execute([
            ':contractId' => $contract['id'],
            ':amount' => $contract['revenue'] / 3,  // for simplicity, I just divided by 3, would not do it in real life :)
            ':dateSigned' => $contract['dateSigned']
        ]);
    }
}
