<?php

require('../vendor/autoload.php');

use App\DB\MyPDO;
use App\Model\Person;

$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$newPerson = new Person($myPdo);

$newPerson->setFirstName('Elon')
    ->setLastName('Musk')
    ->setEmail('elon@spacex.com');

$newPerson->save();

$oldPerson = new Person($myPdo);

$oldPerson->findById(1)
    ->setFirstName('Neil')
    ->setLastName('Armstrong');

$oldPerson->save();

$newPerson->delete();
