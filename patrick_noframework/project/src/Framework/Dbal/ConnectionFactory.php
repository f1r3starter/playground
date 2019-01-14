<?php
/**
 * Created by PhpStorm.
 * User: andreyfilenko
 * Date: 2019-01-14
 * Time: 22:33
 */

namespace SocialNews\Framework\Dbal;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class ConnectionFactory
{
    /**
     * @var DatabaseUrl
     */
    private $databaseUrl;

    public function __construct(DatabaseUrl $databaseUrl)
    {

        $this->databaseUrl = $databaseUrl;
    }

    public function create(): Connection
    {
        return DriverManager::getConnection(
            ['url' => $this->databaseUrl->toString()],
            new Configuration()
        );
    }
}