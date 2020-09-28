<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$container = include __DIR__.'/../src/container.php';
$container->setParameter('charset', 'UTF-8');

$container->setParameter('routes', include __DIR__.'/../src/app.php');

$request = Request::createFromGlobals();

$response = $container->get('framework')->handle($request);

$response->send();
