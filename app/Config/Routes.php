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
$routes->get('/landingpage/login', 'Backend\AuthController::login');
$routes->post('/landingpage/login', 'Backend\AuthController::login');
$routes->post('/landingpage/logout', 'Backend\AuthController::logout');
$routes->get('/show-image-landingpage/(:any)', 'FileController::showImage/$1');
$routes->get('/', 'Frontend\FrontendController::home');
$routes->get('/prodi', 'Frontend\FrontendController::prodi');
$routes->get('/fasilitas', 'Frontend\FrontendController::fasilitas');
$routes->get('/biaya', 'Frontend\FrontendController::biaya');
$routes->get('/kontak-kami', 'Frontend\FrontendController::kontakKami');
$routes->get('/detail-program-seleksi/(:any)', 'Frontend\FrontendController::detailProgramSeleksi/$1');

$routes->get('/landingpage', 'Backend\DashboardController::index', ['filter' => 'auth']);
$routes->get('/landingpage/banners', 'Backend\BannersController::index', ['filter' => 'auth']);
$routes->get('/landingpage/jenis-program', 'Backend\JenisProgramController::index', ['filter' => 'auth']);
$routes->get('/landingpage/fasilitas', 'Backend\FasilitasController::index', ['filter' => 'auth']);
$routes->get('/landingpage/biaya', 'Backend\BiayaController::index', ['filter' => 'auth']);
$routes->get('/landingpage/kontak-kami', 'Backend\KontakKamiController::index', ['filter' => 'auth']);

$routes->get('/landingpage/banners/load-content', 'Backend\BannersController::loadContent', ['filter' => 'auth']);
$routes->get('/landingpage/banners/create', 'Backend\BannersController::create', ['filter' => 'auth']);
$routes->get('/landingpage/banners/update/(:any)', 'Backend\BannersController::update/$1', ['filter' => 'auth']);
$routes->get('/landingpage/banners/delete/(:any)', 'Backend\BannersController::delete/$1', ['filter' => 'auth']);
$routes->post('/landingpage/banners/create', 'Backend\BannersController::create', ['filter' => 'auth']);
$routes->post('/landingpage/banners/update/(:any)', 'Backend\BannersController::update/$1', ['filter' => 'auth']);
$routes->post('/landingpage/banners/delete/(:any)', 'Backend\BannersController::delete/$1', ['filter' => 'auth']);

$routes->get('/landingpage/jenis-program-detail/load-content/(:any)', 'Backend\JenisProgramDetailController::loadContent/$1', ['filter' => 'auth']);
$routes->get('/landingpage/jenis-program-detail/create/(:any)', 'Backend\JenisProgramDetailController::create/$1', ['filter' => 'auth']);
$routes->get('/landingpage/jenis-program-detail/update/(:any)', 'Backend\JenisProgramDetailController::update/$1', ['filter' => 'auth']);
$routes->get('/landingpage/jenis-program-detail/delete/(:any)', 'Backend\JenisProgramDetailController::delete/$1', ['filter' => 'auth']);
$routes->post('/landingpage/jenis-program-detail/create/(:any)', 'Backend\JenisProgramDetailController::create/$1', ['filter' => 'auth']);
$routes->post('/landingpage/jenis-program-detail/update/(:any)', 'Backend\JenisProgramDetailController::update/$1', ['filter' => 'auth']);
$routes->post('/landingpage/jenis-program-detail/delete/(:any)', 'Backend\JenisProgramDetailController::delete/$1', ['filter' => 'auth']);

$routes->get('/landingpage/fasilitas/load-content', 'Backend\FasilitasController::loadContent', ['filter' => 'auth']);
$routes->get('/landingpage/fasilitas/create', 'Backend\FasilitasController::create', ['filter' => 'auth']);
$routes->get('/landingpage/fasilitas/update/(:any)', 'Backend\FasilitasController::update/$1', ['filter' => 'auth']);
$routes->get('/landingpage/fasilitas/delete/(:any)', 'Backend\FasilitasController::delete/$1', ['filter' => 'auth']);
$routes->post('/landingpage/fasilitas/create', 'Backend\FasilitasController::create', ['filter' => 'auth']);
$routes->post('/landingpage/fasilitas/update/(:any)', 'Backend\FasilitasController::update/$1', ['filter' => 'auth']);
$routes->post('/landingpage/fasilitas/delete/(:any)', 'Backend\FasilitasController::delete/$1', ['filter' => 'auth']);

$routes->post('/landingpage/biaya/save/(:any)', 'Backend\BiayaController::save/$1', ['filter' => 'auth']);
$routes->post('/landingpage/kontak-kami/save', 'Backend\KontakKamiController::save', ['filter' => 'auth']);
$routes->get('/landingpage/settings', 'Backend\SettingController::index', ['filter' => 'auth']);
$routes->post('/landingpage/settings/save', 'Backend\SettingController::save', ['filter' => 'auth']);



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
