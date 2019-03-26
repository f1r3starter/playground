<?php

require('../vendor/autoload.php');

use App\Command\FindContract;
use App\DB\MyPDO;
use App\Factory\UpdateCommandFactory;

$contractId = $argv[1];
$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$contract = (new FindContract($myPdo))->getContractById($contractId);

if (empty($contract)) {
    throw new LogicException('Contract not found');
}

$updateCommand = (new UpdateCommandFactory())->createUpdateCommand($myPdo, $contract['type']);
$updateCommand->execute($contract);
