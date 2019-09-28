<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add(
    'is_odd',
    new Route(
        '/is_odd/{num}', [
            'num' => null,
            '_controller' => 'App\Controllers\OddController::index',
        ]
    )
);

return $routes;
