<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::login');
$routes->get('home', 'HomeController::index');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->group('menu', ['filter' => 'auth'], function ($routes) {
    $routes->get('',              'MenuController::index');
    $routes->post('',             'MenuController::create');
    $routes->post('edit/(:any)',  'MenuController::edit/$1');
    $routes->get('delete/(:any)', 'MenuController::delete/$1');
    $routes->post('pesan/(:num)', 'MenuController::pesan/$1'); //
});

$routes->group('pesanan', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'PesananController::index');
    $routes->post('', 'PesananController::create');
    $routes->post('edit/(:any)', 'PesananController::edit/$1');
    $routes->get('delete/(:any)', 'PesananController::delete/$1');
    $routes->get('download', 'PesananController::download');
});

$routes->group('detail_pesanan', ['filter' => 'auth'], function ($routes) {
    $routes->get('',              'DetailPesananController::index');
    $routes->get('(:num)',        'DetailPesananController::index/$1');
    $routes->post('create/(:num)', 'DetailPesananController::create/$1');
    $routes->get('delete/(:num)', 'DetailPesananController::delete/$1');
    $routes->get('download', 'DetailPesananController::download');
});