<?php


namespace App\Repository\SelectionFactory;

use Doctrine\ORM\QueryBuilder;

interface SelectionFactory
{
    public function newSelection(SelectionModel $selectionModel, ?QueryBuilder $qb = null): array;
}
