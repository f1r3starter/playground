<?php

declare(strict_types = 1);

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\{Request, Response};

$request = Request::createFromGlobals();
$response = new Response();

$map = [
    '/hello' => __DIR__ . '/../src/pages/hello.php',
    '/bye' => __DIR__ . '/../src/pages/bye.php'
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not found');
}

$response->send();