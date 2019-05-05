<?php

use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;
use React\Http\Server;

require '../vendor/autoload.php';


$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server('127.0.0.1:8080', $loop);
$connections = [123,321,456,745];


$server = new Server(function (ServerRequestInterface $request) use (&$connections) {
    $x = array_pop($connections);
    sleep(10);
    return new Response(
        200,
        array(
            'Content-Type' => 'text/plain'
        ),
        (string)($x)
    );
});

$server->listen($socket);

$loop->run();
