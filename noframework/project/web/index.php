<?php

declare(strict_types = 1);

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../config/routes.php';

$context = new \Symfony\Component\Routing\RequestContext();
$matcher = new \Symfony\Component\Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new \Symfony\Component\HttpKernel\Controller\ControllerResolver();
$argumentResolver = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver();

$framework = new \App\Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();