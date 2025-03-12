<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/', 'User::index');
$routes->get('/user/(:segment)/edit', 'User::edit/$1');
// $routes->get('/user', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::show/$1', ['filter' => 'role:admin']);
// $routes->get('/admin/index', 'Admin::index');
// $routes->get('/register', 'Home::register');
// $routes->get('/dashboard', 'Home::dashboard');
