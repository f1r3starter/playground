<?php

require('../vendor/autoload.php');

use App\Entity\Person;
use App\DB\MyPDO;

$myPdo = new MyPDO('mysql:host=127.0.0.1;dbname=space;charset=utf8', 'doctrine_user', 'zxcvbnm1', null);

$newPerson = new Person();
$newPerson->setLastName('vasya');

$mapper = new \App\Mapper\DataMapper(Person::class, $myPdo);
$first = $mapper->find(1);
$first->setFirstName('Grisha');
$mapper->save($first);
