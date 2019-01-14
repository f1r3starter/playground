<?php

declare(strict_types = 1);

define('ROOTDIR', dirname(__DIR__));

require ROOTDIR . '/vendor/autoload.php';

$injector = require ROOTDIR . '/src/Dependencies.php';

$connection = $injector->make(\Doctrine\DBAL\Connection::class);

$migrationsFiles = array_diff(scandir(ROOTDIR . '/migrations'), ['.', '..']);
$migrationNamespace = '\\Migrations\\';
array_map(function ($migrationClass) use ($migrationNamespace, $connection) {
    $class = $migrationNamespace . str_replace('.php', '', $migrationClass);
    if (class_exists($class)) {
        $migration = new $class($connection);
        $migration->migrate();
    }
}, $migrationsFiles);