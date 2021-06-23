<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/Login', 'Login::index');

// Admin
$routes->get('/Home', 'Pages::index');
$routes->get('/Profile/', 'Pages::profile');
$routes->get('/Manage-user', 'Pages::manage_user');

// User
$routes->get('/User', 'User::index');
$routes->get('/Profile-user', 'User::profile');

// Grafik
$routes->get('/Grafik-masuk', 'Pages::grafik_masuk');
$routes->get('/Grafik-keluar', 'Pages::grafik_keluar');

// Laporan pengisian
$routes->get('/Pengisian-pertalite', 'Pages::pengisian_pertalite');
$routes->get('/Pengisian-pertamax', 'Pages::pengisian_pertamax');

// Laporan pengeluaran
$routes->get('/Pengeluaran-pertalite', 'Pages::pengeluaran_pertalite');
$routes->get('/Pengeluaran-pertamax', 'Pages::pengeluaran_pertamax');

// Email
$routes->get('/sendEmailPertalite', 'Pages::sendEmailPertalite');
$routes->get('/sendEmailPertamax', 'Pages::sendEmailPertamax');


// Get data sensor dari nodemcu
// Pertalite ---------------------------------------
$routes->get('/Pages/save_tinggi_pertalite/(:segment)', 'Pages::save_tinggi_pertalite/$1');
$routes->get('/Pages/save_pertalite_masuk/(:segment)', 'Pages::save_pertalite_masuk/$1');
$routes->get('/Pages/save_pertalite_keluar/(:segment)', 'Pages::save_pertalite_keluar/$1');
// Pertamax ----------------------------------------
$routes->get('/Pages/save_tinggi_pertamax/(:segment)', 'Pages::save_tinggi_pertamax/$1');
$routes->get('/Pages/save_pertamax_masuk/(:segment)', 'Pages::save_pertamax_masuk/$1');
$routes->get('/Pages/save_pertamax_keluar/(:segment)', 'Pages::save_pertamax_keluar/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
