<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Variabel Filter
$authFilter = ['filter' => 'auth'];

// Variabel Role
$admin     = ['filter' => 'role:admin'];
$guru      = ['filter' => 'role:guru'];
$siswa      = ['filter' => 'role:siswa'];
$kepsek      = ['filter' => 'role:kepsek'];
$allRole   = ['filter' => 'role:admin, siswa, guru'];

// Login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Halaman utama
$routes->get('/', 'Home::index', $authFilter);
$routes->get('/dashboard', 'Home::index', $authFilter);

// user
$routes->get('users', 'users::index', $admin);
$routes->get('users/create', 'users::create');
$routes->post('users/store', 'users::store');
$routes->get('users/edit/(:num)', 'users::edit/$1', $allRole);
$routes->post('users/update/(:num)', 'users::update/$1', $allRole);
$routes->get('users/delete/(:num)', 'users::delete/$1', $admin);
