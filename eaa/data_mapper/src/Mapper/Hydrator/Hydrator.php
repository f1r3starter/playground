<?php

namespace App\Mapper\Hydrator;

interface Hydrator
{
    public function hydrate(array $row, string $className);

    public function dehydrate($object): array;
}
