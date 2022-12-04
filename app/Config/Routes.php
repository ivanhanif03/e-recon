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
$routes->get('/order', 'Order::index');
$routes->get('/daftar_sla', 'Sla::index');
$routes->get('/login', 'Login::index');
$routes->get('/status', 'Status::index');

//Gangguan Supervisor
$routes->get('/gangguan/supervisor', 'GangguanSupervisor::index', ['filter' => 'role:supervisor']);
$routes->get('/gangguan/supervisor/index', 'GangguanSupervisor::index', ['filter' => 'role:supervisor']);
$routes->delete('/gangguan/supervisor/(:num)', 'GangguanSupervisor::delete/$1', ['filter' => 'role:supervisor']);
// $routes->get('/gangguan/supervisor/edit/(:segment)', 'GangguanSupervisor::edit/$1', ['filter' => 'role:supervisor']);

//Gangguan BTN
$routes->get('/gangguan/btn', 'GangguanBtn::index', ['filter' => 'role:user-btn']);
$routes->get('/gangguan/btn/index', 'GangguanBtn::index', ['filter' => 'role:user-btn']);
$routes->delete('/gangguan/btn/(:num)', 'GangguanBtn::delete/$1', ['filter' => 'role:user-btn']);
// $routes->get('/gangguan/btn/edit/(:segment)', 'GangguanBtn::edit/$1', ['filter' => 'role:user-btn']);

//Gangguan Provider
$routes->get('/gangguan/provider', 'GangguanProvider::index', ['filter' => 'role:user-provider']);
$routes->get('/gangguan/provider/index', 'GangguanProvider::index', ['filter' => 'role:user-provider']);
// $routes->get('/gangguan/provider/edit/(:segment)', 'GangguanProvider::edit/$1');

//Link
$routes->get('/link', 'Link::index', ['filter' => 'role:admin']);
$routes->get('/link/index', 'Link::index', ['filter' => 'role:admin']);
$routes->delete('/link/(:num)', 'Link::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/link/edit/(:segment)', 'Link::edit/$1');

//Regional
$routes->get('/regional', 'Regional::index', ['filter' => 'role:admin']);
$routes->get('/regional/index', 'Regional::index', ['filter' => 'role:admin']);
$routes->delete('/regional/(:num)', 'Regional::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/regional/edit/(:segment)', 'Regional::edit/$1');

//Branch
$routes->get('/branch', 'Branch::index', ['filter' => 'role:admin']);
$routes->get('/branch/index', 'Branch::index', ['filter' => 'role:admin']);
$routes->delete('/branch/(:num)', 'Branch::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/branch/edit/(:segment)', 'Branch::edit/$1');

//Provider
$routes->get('/provider', 'Provider::index', ['filter' => 'role:admin']);
$routes->get('/provider/index', 'Provider::index', ['filter' => 'role:admin']);
$routes->delete('/provider/(:num)', 'Provider::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/provider/edit/(:segment)', 'Provider::edit/$1');

//Jenis Branch
$routes->get('/jenis_branch', 'JenisBranch::index', ['filter' => 'role:admin']);
$routes->get('/jenis_branch/index', 'JenisBranch::index', ['filter' => 'role:admin']);
$routes->delete('/jenis_branch/(:num)', 'JenisBranch::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/jenis_branch/edit/(:segment)', 'JenisBranch::edit/$1');

//Klasifikasi Branch
$routes->get('/klasifikasi_branch', 'KlasifikasiBranch::index', ['filter' => 'role:admin']);
$routes->get('/klasifikasi_branch/index', 'KlasifikasiBranch::index', ['filter' => 'role:admin']);
$routes->delete('/klasifikasi_branch/(:num)', 'KlasifikasiBranch::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/klasifikasi_branch/edit/(:segment)', 'KlasifikasiBranch::edit/$1');

//Hak Akses
$routes->get('/hak_akses', 'HakAkses::index', ['filter' => 'role:admin']);
$routes->get('/hak_akses/index', 'HakAkses::index', ['filter' => 'role:admin']);
$routes->delete('/hak_akses/(:num)', 'HakAkses::delete/$1', ['filter' => 'role:admin']);
// $routes->get('/hak_akses/edit/(:segment)', 'HakAkses::edit/$1');

//User
$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'role:admin']);
$routes->get('/pengguna/index', 'Pengguna::index', ['filter' => 'role:admin']);
$routes->delete('/pengguna/(:num)', 'Pengguna::delete/$1', ['filter' => 'role:admin']);
$routes->get('/pengguna/(:any)', 'Pengguna::detail/$1', ['filter' => 'role:admin']);
// $routes->get('/pengguna/edit/(:segment)', 'Pengguna::edit/$1');

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
