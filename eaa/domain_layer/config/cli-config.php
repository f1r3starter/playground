<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

// replace with file to your own project bootstrap
require_once __DIR__ . '/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => '',
    'password' => '',
    'dbname'   => 'hospital',
);

$config = Setup::createXMLMetadataConfiguration([__DIR__ . '/mapping'], true);
$entityManager = EntityManager::create($conn, $config);

return ConsoleRunner::createHelperSet($entityManager);

