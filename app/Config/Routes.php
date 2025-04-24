<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Utama → Login
$routes->get('/', 'Auth::index');

// Grup Route Auth
$routes->group('auth', function($routes) {
    $routes->get('register', 'Auth::register');
    $routes->post('save', 'Auth::save');
    $routes->get('login', 'Auth::index');
    $routes->post('login', 'Auth::doLogin');
    $routes->post('check', 'Auth::check');
    $routes->get('logout', 'Auth::logout');
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
    $routes->post('save', 'Auth::save');
    $routes->get('/dashboard', 'Dashboard::index');

});

// Dashboard (Hanya bisa diakses setelah login)
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);