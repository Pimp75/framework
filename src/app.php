<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}
$routes = new RouteCollection();

$routes->add('is_leap_year', new Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => function (Request $request) {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('This is not a lap year');
    }
]));

$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => 'render_template'
]));
$routes->add('bye', new Route('/bye', ['_controller' => 'render_template']));

return $routes;
