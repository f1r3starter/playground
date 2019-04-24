<?php

require('../vendor/autoload.php');

use App\Mapper\Reader\AnnotationReader;
use App\Entity\Person;

//$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$newPerson = new Person();

$mapper = new AnnotationReader();
$table = $mapper->prepareTable(Person::class);

$hydrator = new \App\Mapper\Hydrator\TableHydrator($table);

print_r($hydrator->hydrate(['ID' => 123, 'FIRST_NAME' => 'aa', 'LAST_NAME' => 'bb'], Person::class));
