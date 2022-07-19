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
$routes->get('/', 'Home::index');
$routes->get('services', 'Home::services');
$routes->get('profile', 'Home::profile');
$routes->get('request', 'Home::request');
$routes->get('categories', 'Home::categories');
$routes->get('activeJobs', 'Home::activeJobs');
$routes->get('browseJobs', 'Home::browseJobs');
$routes->get('jobRequests', 'Home::jobRequests');
$routes->get('workerLogin', 'Home::workerLogin');
$routes->get('workerRegister', 'Home::workerRegister');
$routes->get('admin_home', 'Home::admin_home');
$routes->get('admin_profile', 'Home::admin_profile');
$routes->get('admin_request', 'Home::admin_request');
$routes->get('admin_issues', 'Home::admin_issues');
$routes->get('adminServiceAdd', 'Home::adminServiceAdd');
$routes->get('datahandling', 'data_handling::addService');
$routes->get('adminServices', 'Home::adminServices');
$routes->get('logout', 'Home::logout');

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
