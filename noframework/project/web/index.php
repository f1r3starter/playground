<?php

declare(strict_types = 1);

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\{Request, Response};

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../config/routes.php';

$context = new \Symfony\Component\Routing\RequestContext();
$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);

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