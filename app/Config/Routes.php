<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/gangguan', 'Gangguan::index');
$routes->get('/order', 'Order::index');
$routes->get('/daftar_sla', 'Sla::index');
$routes->get('/login', 'Login::index');
$routes->get('/branch', 'Branch::index');
$routes->get('/jenis_branch', 'JenisBranch::index');
$routes->get('/klarifikasi_branch', 'KlarifikasiBranch::index');
$routes->get('/link', 'Link::index');
$routes->get('/status', 'Status::index');
$routes->get('/stop_clock', 'StopClock::index');

//Regional
$routes->get('/regional', 'Regional::index');
$routes->get('/regional', 'Regional::index', ['filter' => 'role:admin']);
$routes->get('/regional/index', 'Regional::index', ['filter' => 'role:admin']);
$routes->delete('/regional/(:num)', 'Regional::delete/$1', ['filter' => 'role:admin']);
$routes->get('/regional/edit/(:segment)', 'Regional::edit/$1');

//Provider
$routes->get('/provider', 'Provider::index');
$routes->get('/provider', 'Provider::index', ['filter' => 'role:admin']);
$routes->get('/provider/index', 'Provider::index', ['filter' => 'role:admin']);
$routes->delete('/provider/(:num)', 'Provider::delete/$1', ['filter' => 'role:admin']);
$routes->get('/provider/edit/(:segment)', 'Provider::edit/$1');

//Jenis Branch
$routes->get('/jenis_branch', 'JenisBranch::index');
$routes->get('/jenis_branch', 'JenisBranch::index', ['filter' => 'role:admin']);
$routes->get('/jenis_branch/index', 'JenisBranch::index', ['filter' => 'role:admin']);
$routes->delete('/jenis_branch/(:num)', 'JenisBranch::delete/$1', ['filter' => 'role:admin']);
$routes->get('/jenis_branch/edit/(:segment)', 'JenisBranch::edit/$1');

//Hak Akses
$routes->get('/hak_akses', 'HakAkses::index');
$routes->get('/hak_akses', 'HakAkses::index', ['filter' => 'role:admin']);
$routes->get('/hak_akses/index', 'HakAkses::index', ['filter' => 'role:admin']);
$routes->delete('/hak_akses/(:num)', 'HakAkses::delete/$1', ['filter' => 'role:admin']);
$routes->get('/hak_akses/edit/(:segment)', 'HakAkses::edit/$1');

//User
$routes->get('/user', 'User::index');
$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'role:admin']);
$routes->get('/pengguna/index', 'Pengguna::index', ['filter' => 'role:admin']);
$routes->delete('/pengguna/(:num)', 'Pengguna::delete/$1', ['filter' => 'role:admin']);
$routes->get('/pengguna/(:any)', 'Pengguna::detail/$1');
$routes->get('/pengguna/edit/(:segment)', 'Pengguna::edit/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}