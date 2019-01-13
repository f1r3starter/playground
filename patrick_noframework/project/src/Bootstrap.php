<?php

declare(strict_types = 1);

define('ROOTDIR', dirname(__DIR__));

require ROOTDIR . '/vendor/autoload.php';

\Tracy\Debugger::enable(false);

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $routes = require __DIR__ . '/Routes.php';
    foreach ($routes as $route) {
        $r->addRoute(...$route);
    }
});

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $response = new \Symfony\Component\HttpFoundation\Response('Not found', 404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response = new \Symfony\Component\HttpFoundation\Response('Method not allowed', 405);
        break;
    case \FastRoute\Dispatcher::FOUND:
        [$controllerClass, $method] = explode('#', $routeInfo[1]);
        $vars = $routeInfo[2];
        $injector = require __DIR__ . '/Dependencies.php';
        $controller = $injector->make($controllerClass);
        $response = $controller->$method($request, $vars);
        break;
}

$response->prepare($request);
$response->send();