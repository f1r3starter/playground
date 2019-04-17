<?php

require('../vendor/autoload.php');

use App\Table\PersonGateway;
use App\DB\MyPDO;

$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$personGateway = new PersonGateway($myPdo);

$newPersonId = $personGateway->create('Neil', 'Armstrong', 'neil@nasa.gov');

$foundPerson = $personGateway->findById($newPersonId);

$personGateway->update(
    $foundPerson->getId(),
    'Elon',
    'Musk',
    'musk@spacex.org'
);

$personGateway->delete($foundPerson->getId());
