<?php


namespace App\Contracts;


interface Storage
{
    public function firstQuery(): array;

    public function secondQuery(): array;
}
