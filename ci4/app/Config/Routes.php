<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->get('/', 'Pages::index');
// $routes->get('/example', function () {
//   echo "Hello World";
// });

$routes->get('/example/index', 'Example::index');
$routes->get('/example/about', 'Example::about');
$routes->get('/example/(:any)', 'Example::about/$1');

$routes->get('/users', 'Admin\Users::index');

// Comics Routes
$routes->resource('comics');

// $routes->get('comics/(:any)/edit', 'Comics::edit/$1');
// $routes->get('/comics/new', 'Comics::new');
// $routes->post('/comics', 'Comics::create');
// $routes->get('/comics', 'Comics::index');
// $routes->get('/comics/(:any)', 'Comics::show/$1');
// $routes->put('comics/(:any)', 'Comics::update/$1');
// $routes->delete('/comics/(:num)', 'Comics::delete/$1');
// End Of Comics Routes