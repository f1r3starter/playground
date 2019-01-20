<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 22:44
 */

namespace Migrations;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

class Migration20190120 implements Migratable
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function migrate(): void
    {
        $schema = new Schema();
        $this->createSubmissionTable($schema);

        $queries = $schema->toSql($this->connection->getDatabasePlatform());
        foreach ($queries as $query)
        {
            $this->connection->executeQuery($query);
        }
    }

    private function createSubmissionTable(Schema $schema)
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', Type::GUID);
        $table->addColumn('nickname', Type::STRING);
        $table->addColumn('password_hash', Type::STRING);
        $table->addColumn('created_at', Type::DATETIME);
        $table->addColumn('failed_login_attempts', Type::INTEGER, [
            'default' => 0
        ]);
        $table->addColumn('last_failed_login_attempt', Type::DATETIME, [
            'notnull' => false
        ]);
    }
}