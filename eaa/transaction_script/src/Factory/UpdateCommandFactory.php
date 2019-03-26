<?php

namespace App\Factory;

use App\Command\DatabaseRevenue;
use App\Command\SpreadsheetRevenue;
use App\Command\UpdateCommand;
use App\Command\WordRevenue;
use App\DB\MyPDO;
use InvalidArgumentException;

class UpdateCommandFactory
{
    public const TYPE_WORD = 'w';
    public const TYPE_DATABASE = 'd';
    public const TYPE_SPREADSHEET = 's';

    public function createUpdateCommand(MyPDO $pdo, string $type): UpdateCommand
    {
        switch ($type) {
            case self::TYPE_WORD:
                return new WordRevenue($pdo);
            case self::TYPE_DATABASE:
                return new DatabaseRevenue($pdo);
            case self::TYPE_SPREADSHEET:
                return new SpreadsheetRevenue($pdo);
            default:
                throw new InvalidArgumentException('Unrecognized revenue type');
        }
    }
}
