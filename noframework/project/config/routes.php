<?php

$routes->add('test', new \Symfony\Component\Routing\Route('/test/{var}'),
    [
       'var' => null,
       '_controller' => 'App\Controllers\TestController::index'
    ]);