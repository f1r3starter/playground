<?php

require('../vendor/autoload.php');

use App\Entity\Person;
use App\Entity\Email;
use App\Mapper\DataMapper;
use App\DB\MyPDO;

$myPdo = new MyPDO('mysql:host=127.0.0.1;dbname=;charset=utf8', '', '', null);

$personMapper = new DataMapper(Person::class, $myPdo);
$emailMapper = new DataMapper(Email::class, $myPdo);

$newEmail = new Email();
$newEmail->setEmail('elon@musk.com');

$emailMapper->save($newEmail);

$newPerson = new Person();
$newPerson->setFirstName('Elon')
    ->setLastName('Musk')
    ->setEmail($newEmail);

$personMapper->save($newPerson);

$oldPerson = $personMapper->find(1);
$personMapper->delete($oldPerson);
