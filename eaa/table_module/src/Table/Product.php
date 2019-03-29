<?php

namespace App\Table;

class Product extends Table
{
    public const TYPE_WORD = 'w';
    public const TYPE_DATABASE = 'd';
    public const TYPE_SPREADSHEET = 's';

    protected function getTableName(): string
    {
        return 'products';
    }

    public function getProductType(string $id): string
    {
        return $this->findById($id)['type'];
    }
}
