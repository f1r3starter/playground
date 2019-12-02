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

class Migration20190114
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
        foreach ($queries as $query) {
            $this->connection->executeQuery($query);
        }
    }

    private function createSubmissionTable(Schema $schema)
    {
        $table = $schema->createTable('submissions');
        $table->addColumn('id', Type::GUID);
        $table->addColumn('url', Type::STRING);
        $table->addColumn('title', Type::STRING);
        $table->addColumn('created_at', Type::DATETIME);
        $table->addColumn('author_user_id', Type::GUID);
        $table->addForeignKeyConstraint('user', ['author_user_id'], ['id']);
    }
}
