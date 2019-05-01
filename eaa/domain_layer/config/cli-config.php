<?php

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once __DIR__ . '/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
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
$config->setProxyDir(__DIR__  . '/../src/Proxy');
$config->setProxyNamespace('App\Proxy');

$entityManager = EntityManager::create($conn, $config);

return ConsoleRunner::createHelperSet($entityManager);

