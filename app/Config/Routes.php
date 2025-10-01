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
$siswa     = ['filter' => 'role:siswa'];
$user      = ['filter' => 'role:siswa, guru'];
$kepsek    = ['filter' => 'role:kepsek'];
$allRole   = ['filter' => 'role:admin, siswa, guru, kepsek'];

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

// profil
$routes->get('profil/edit/(:num)', 'profil::edit/$1', $allRole);
$routes->post('profil/update/(:num)', 'profil::update/$1', $allRole);

// jenis
$routes->get('jenis', 'jenis::index', $admin);
$routes->get('jenis/create', 'jenis::create');
$routes->post('jenis/store', 'jenis::store');
$routes->get('jenis/edit/(:num)', 'jenis::edit/$1', $allRole);
$routes->post('jenis/update/(:num)', 'jenis::update/$1', $allRole);
$routes->get('jenis/delete/(:num)', 'jenis::delete/$1', $admin);

// sarana
$routes->get('sarana', 'Sarana::index', $allRole);
$routes->get('sarana/create', 'Sarana::create', $admin);
$routes->post('sarana/store', 'Sarana::store', $admin);
$routes->get('sarana/edit/(:num)', 'Sarana::edit/$1', $admin);
$routes->post('sarana/update/(:num)', 'Sarana::update/$1', $admin);
$routes->get('sarana/delete/(:num)', 'Sarana::delete/$1', $admin);
$routes->get('sarana/detail/(:num)', 'Sarana::detail/$1', $allRole);
$routes->post('sarana/addFoto/(:num)', 'Sarana::addFoto/$1', $admin);
$routes->get('sarana/deleteFoto/(:num)/(:num)', 'Sarana::deleteFoto/$1/$2', $admin);

// peminjaman
$routes->get('peminjaman', 'Peminjaman::index', $allRole);
$routes->get('peminjaman/create', 'Peminjaman::create', $user);
$routes->post('peminjaman/store', 'Peminjaman::store', $user);
$routes->get('peminjaman/edit/(:num)', 'Peminjaman::edit/$1', $admin);
$routes->get('peminjaman/cetak/(:num)', 'Peminjaman::cetak/$1', $allRole);
$routes->post('peminjaman/update/(:num)', 'Peminjaman::update/$1', $admin);
$routes->get('/peminjaman/cancel/(:num)', 'Peminjaman::cancel/$1', ['filter' => 'role:siswa,guru']);
$routes->get('/peminjaman/delete/(:num)', 'Peminjaman::delete/$1', ['filter' => 'role:admin']);


// Backup Database
$routes->get('/backup', 'Backup::database', $allRole);
