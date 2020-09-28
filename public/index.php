<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;
use Symfony\Component\HttpKernel\HttpCache\Store;
use Pimp\Framework;

$request = Request::createFromGlobals();

$routes = include __DIR__.'/../src/app.php';

$framework = new Framework($routes);

$framework = new HttpCache($framework, new Store(__DIR__.'../var/cache'));

$response = $framework->handle($request);
$response->send();
