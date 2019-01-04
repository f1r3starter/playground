<?php

$routes = new \Symfony\Component\Routing\RouteCollection();

$routes->add(
    'is_odd',
    new \Symfony\Component\Routing\Route(
        '/is_odd/{num}', [
        'num' => null,
        '_controller' => 'App\Controllers\OddController::index',
    ]
    )
);

return $routes;