<?php

namespace App\Mapper\Reader;

use App\Mapper\Structure\Table;

interface MetadataReader
{
    public function prepareTable(string $className): Table;
}
