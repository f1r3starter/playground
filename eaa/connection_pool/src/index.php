<?php

use App\DB\ConnectionPool;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;
use React\Http\StreamingServer;

require '../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('127.0.0.1:8080', $loop);
$connectionPool = new ConnectionPool($loop, 'test:test@localhost:3308/test');

$server = new StreamingServer(
    function (ServerRequestInterface $request) use ($connectionPool) {
        $connection = $connectionPool->getConnection(true);
        return $connection->query('select sleep(7);')
            ->then(
                function (array $result) use ($connection, $connectionPool) {
                    $connectionPool->closeConnection($connection);
                    return $result;
                }
            )
            ->then(
                function (array $result) use ($connectionPool) {
                    return new Response(
                        200,
                        array(
                            'Content-Type' => 'text/plain',
                        ),
                        $connectionPool->countConnections()
                    );
                }
            )
            ->otherwise(function (Exception $exception) {
                return new Response(
                    500,
                    array(
                        'Content-Type' => 'text/plain',
                    ),
                    $exception->getMessage()
                );
            });
    }
);

$server->listen($socket);
$loop->run();
