<?php

require('../vendor/autoload.php');

use App\Table\Contract;
use App\Table\Product;
use App\Table\RevenueRecognition;
use App\Domain\CalculateRecognition;
use App\DB\MyPDO;

$contractId = $argv[1];
$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$contractRow = (new Contract($myPdo))->findById($contractId);
$productRow = (new Product($myPdo))->findById($contract['product']);

$calcucalteRecognition = new CalculateRecognition(
    new RevenueRecognition($myPdo)
);

$calcucalteRecognition->calculate(
    $productRow['type'],
    $contract['id'],
    $contract['amount'],
    $contract['dateSigned']
);