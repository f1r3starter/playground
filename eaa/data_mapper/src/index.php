<?php

require('../vendor/autoload.php');

use App\DB\MyPDO;
use App\Entity\Person;

//$myPdo = new MyPDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$newPerson = new Person();

$mapper = (new \App\Mapper\AnnotationMapper(new ReflectionClass(Person::class)))->mapFields();
