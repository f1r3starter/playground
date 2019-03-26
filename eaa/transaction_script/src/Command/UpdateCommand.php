<?php

namespace App\Command;

abstract class UpdateCommand extends DBCommand
{
    abstract public function execute(array $contract): void;
}
