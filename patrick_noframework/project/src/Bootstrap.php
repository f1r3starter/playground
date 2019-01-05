<?php

declare(strict_types = 1);

define('ROOTDIR', dirname(__DIR__));

require ROOTDIR . '/vendor/autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$content = 'Hi ' . $request->get('name', 'anonymous');

$response = new \Symfony\Component\HttpFoundation\Response($content);

$response->prepare($request);

$response->send();