<?php

require('../vendor/autoload.php');

use App\Table\PersonFinder;
use App\Domain\Person;
use App\DB\MyPDO;

$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$newPerson = Person::create($myPdo);
$newPerson
    ->setFirstName('Elon')
    ->setLastName('Musk')
    ->setEmail('elon@spacex.com');
$newPerson->save();



$personFinder = new PersonFinder($myPdo);
$oldPerson = $personFinder->findById(13);

$oldPerson->setFirstName('Neil')
    ->setLastName('Armstrong')
    ->setEmail('neil@nasa.gov');
$oldPerson->save();

$newPerson->delete();
