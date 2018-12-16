<?php

require('vendor/autoload.php');

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container,new FileLocator('./'));
$loader->load('conf.yaml');

$container->get('logger')->info(123);