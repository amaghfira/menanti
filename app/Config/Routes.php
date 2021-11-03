<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
// $routes->post('/login', 'Login::process');
// $routes->get('/logout', 'Login::logout');
$routes->group('', ['filter' => 'authFilter'], function($routes) {
    $routes->get('/admin/home', 'HomeAdmin::index');
    $routes->get('/ticket','Tiket::index');
    $routes->get('/ticket/show','Tiket::show/$1');
    $routes->get('/ticket/edit','Tiket::edit/$1');

    $routes->get('/user/home', 'HomeUser::index');
    $routes->get('/user/ticket','TiketUser::index');
    $routes->get('/user/ticket/show','TiketUser::show/$1');
    $routes->get('/user/ticket/edit','TiketUser::edit/$1');
    $routes->get('/user/ticket/add','Tiketuser::add');
});


$routes->get('/pesan/','SendMail::index');

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
