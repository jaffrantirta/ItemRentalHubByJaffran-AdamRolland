<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->get('/', 'HomeController::index');
// $routes->get('/login', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);

//item category
$routes->get('/itemcategory', 'ItemCategoryController::index', ['filter' => 'authGuard']);
$routes->get('/itemcategory/create', 'ItemCategoryController::create', ['filter' => 'authGuard']);
$routes->get('/itemcategory/edit/(:num)', 'ItemCategoryController::edit/$1', ['filter' => 'authGuard']);
$routes->post('/itemcategory/store', 'ItemCategoryController::store', ['filter' => 'authGuard']);
$routes->post('/itemcategory/update', 'ItemCategoryController::update', ['filter' => 'authGuard']);
$routes->post('/itemcategory/delete/(:num)', 'ItemCategoryController::destroy/$1', ['filter' => 'authGuard']);

//item
$routes->get('/item', 'ItemController::index', ['filter' => 'authGuard']);
$routes->get('/item/create', 'ItemController::create', ['filter' => 'authGuard']);
$routes->post('/item/store', 'ItemController::store', ['filter' => 'authGuard']);
$routes->get('/item/edit/(:num)', 'ItemController::edit/$1', ['filter' => 'authGuard']);
$routes->post('/item/update', 'ItemController::update', ['filter' => 'authGuard']);
$routes->post('/item/delete/(:num)', 'ItemController::destroy/$1', ['filter' => 'authGuard']);

//transaction
$routes->get('/rentaldata', 'RentalDataController::index', ['filter' => 'authGuard']);
$routes->get('/rentaldetail/(:num)', 'RentalDataController::show/$1', ['filter' => 'authGuard']);
$routes->post('/action', 'RentalDataController::action', ['filter' => 'authGuard']);

//report
$routes->get('/report', 'ReportController::index', ['filter' => 'authGuard']);
$routes->get('/report/test', 'ReportController::generateReport', ['filter' => 'authGuard']);
$routes->get('/report/item/(:num)', 'ReportController::itemReport/$1', ['filter' => 'authGuard']);
$routes->get('/report/transaction/(:num)', 'ReportController::transactionDetailReport/$1', ['filter' => 'authGuard']);
$routes->post('/report/transaction', 'ReportController::transactionReport', ['filter' => 'authGuard']);

//my account

$routes->get('/setting', 'AccountController::adminAccount', ['filter' => 'authGuard']);
$routes->get('/account', 'AccountController::adminAccount', ['filter' => 'authGuard']);
$routes->post('/account/update', 'AccountController::update', ['filter' => 'authGuard']);




//customer
$routes->get('/customer', 'CustomerController::index', ['filter' => 'authGuard']);
$routes->get('/', 'HomeController::index');
$routes->get('/category/(:num)', 'HomeController::byCategory/$1');
$routes->get('/item/(:num)', 'HomeController::showDetailItem/$1');
$routes->get('/cart', 'CartController::index');
$routes->post('/cart', 'CartController::addToCart');

$routes->get('/account/customer', 'AccountController::index');
$routes->get('/logout', 'SigninController::logout');

$routes->post('/transaction', 'TransactionController::store');
$routes->post('/transaction/(:num)', 'TransactionController::storeReceipt/$1');
$routes->get('/transaction', 'TransactionController::index');
$routes->get('/transaction/(:num)', 'TransactionController::show/$1');



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
