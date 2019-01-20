<?php

declare(strict_types = 1);

define('ROOTDIR', dirname(__DIR__));

require ROOTDIR . '/vendor/autoload.php';

$injector = require ROOTDIR . '/src/Dependencies.php';

$connection = $injector->make(\Doctrine\DBAL\Connection::class);

$migrationsFiles = array_diff(scandir(ROOTDIR . '/migrations'), ['.', '..']);
function availableMigrations()
{
    $migrations = [];
    foreach (new FilesystemIterator(ROOTDIR . '/migrations') as $file) {
        $migrations = $file->getBaseName('.php');
    }

    return array_reverse($migrations);
}

function selectMigration(array $migrations): int
{
    echo '[0] All' . PHP_EOL;
    foreach ($migrations as $key => $migration) {
        echo "[" . ++$key . "] $migration";
    }
    $selected = readline('Choose migration to run:');
    if ($selected != '0' && !isset($migrations[$selected-1])) {
        die('Migration does`nt exist');
    }

    return (int)$selected;
}

$migrationNamespace = '\\Migrations\\';
array_map(function ($migrationClass) use ($migrationNamespace, $connection) {
    $class = $migrationNamespace . str_replace('.php', '', $migrationClass);
    if (class_exists($class)) {
        $migration = new $class($connection);
        $migration->migrate();
    }
}, $migrationsFiles);