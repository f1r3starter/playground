<?php

use App\Repository\SelectionFactory\DoctorSelectionFactory;
use App\Repository\SelectionFactory\DoctorSelectionModel;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;

require_once __DIR__ . '/../vendor/autoload.php';

$conn = array(
    'driver' => 'pdo_mysql',
    'user' => '',
    'password' => '',
    'dbname' => '',
);

$driver = new SimplifiedXmlDriver([__DIR__ . '/../config/mapping' => 'App\Entity']);
$config = (new Configuration());
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driver);
$config->setProxyDir(__DIR__ . '/Proxy');
$config->setProxyNamespace('App\Proxy');


$entityManager = EntityManager::create($conn, $config);


$dr = new DoctorSelectionModel();
$dr = $dr->setSpeciality('cardiolog');

$factory = new DoctorSelectionFactory($entityManager);

print_r($factory->newSelection($dr));
