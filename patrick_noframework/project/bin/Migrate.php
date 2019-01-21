<?php

declare(strict_types=1);

define('ROOTDIR', dirname(__DIR__));

require ROOTDIR . '/vendor/autoload.php';

$injector = require ROOTDIR . '/src/Dependencies.php';

$connection = $injector->make(\Doctrine\DBAL\Connection::class);

function availableMigrations()
{
    $migrations = [];
    foreach (new FilesystemIterator(ROOTDIR . '/migrations') as $file) {
        $migrations[] = $file->getBaseName('.php');
    }

    return $migrations;
}

function selectMigration(array $migrations): int
{
    echo '[0] All' . PHP_EOL;
    foreach ($migrations as $key => $migration) {
        echo "[" . ++$key . "] $migration" . PHP_EOL;
    }
    $selected = readline('Choose migration to run:');
    if ($selected != '0' && !isset($migrations[$selected - 1])) {
        die('Migration does`nt exist');
    }

    return (int)$selected;
}

function migrate(array $migrations, int $selected, $connection): void
{
    foreach ($migrations as $key => $migration) {
        if ($selected === 0 || ($key + 1) === $selected) {
            $class = "Migrations\\$migration";
            if (class_exists($class)) {
                $migration = new $class($connection);
                $migration->migrate();
            }
        }
    }
}

$migrations = availableMigrations();
$selected = selectMigration($migrations);
migrate($migrations, $selected, $connection);