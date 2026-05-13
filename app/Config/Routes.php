<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('soupis_rocniku/(:num)', 'Main::soupis_rocniku/$1');
