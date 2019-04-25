<?php

namespace App\Mapper\Query;


use App\Mapper\Structure\Table;

interface StatementBuilder
{
    public function __construct(Table $table);

    public function find(): string;

    public function insert(): string;

    public function update(): string;

    public function delete(): string;
}
