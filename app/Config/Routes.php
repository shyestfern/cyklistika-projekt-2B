<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('soupis_rocniku/(:num)', 'Main::soupis_rocniku/$1');
$routes->get('soupis_poradi/(:num)', 'Main::soupis_poradi/$1');
$routes->get('polozka/pridat', 'Main::pridat');
$routes->post('polozka/vytvorit', 'Main::vytvorit');
