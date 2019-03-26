<?php

namespace App\Command;

use PDO;

class FindContract extends DBCommand
{
    public function getContractById(string $id): array
    {
        return $this->pdo->run(
            "SELECT * FROM contracts 
                    INNER JOIN products ON products.id = contracts.product WHERE contracts.id = ?",
            [$id]
        )->fetch(PDO::FETCH_ASSOC);
    }
}
