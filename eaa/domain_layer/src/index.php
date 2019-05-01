<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Configuration;

require_once __DIR__ . '/../vendor/autoload.php';

$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => '',
    'password' => '',
    'dbname'   => '',
);
$driver = new SimplifiedXmlDriver([__DIR__ . '/../config/mapping' => 'App\Entity']);
$config = (new Configuration());
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driver);
$config->setProxyDir(__DIR__  . '/Proxy');
$config->setProxyNamespace('App\Proxy');


$entityManager = EntityManager::create($conn, $config);


$dr = $entityManager->getRepository(\App\Entity\Doctor::class);
$doctor = $dr->getDoctorById(1);

echo $doctor->getFirstName();
