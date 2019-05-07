<?php

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;
use React\Http\Server;

require '../vendor/autoload.php';


$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('127.0.0.1:8080', $loop);
$connectionPool = new \App\DB\ConnectionPool('mysql:host=localhost;dbname=test;charset=utf8', '', '', null);

$server = new Server(function (ServerRequestInterface $request) use ($connectionPool) {

    $connection = $connectionPool->getConnection();
    $connection->someLongQuery();
    $connectionPool->closeConnection($connection);

    return new Response(
        200,
        array(
            'Content-Type' => 'text/plain'
        ),
        $connectionPool->countConnections()
    );
});

$server->listen($socket);

$loop->run();
