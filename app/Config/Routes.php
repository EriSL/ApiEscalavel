<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */


/**
 * Redirect para login
 */
if(!session()->has('user_id')) {
    $routes->addRedirect('/', 'admin/dashboard');
} else {
    $routes->addRedirect('/', 'auth/login');
}


/**
 * Rotas de Autenticação
 * @version 1.0.0
 * @description Rotas responsaveis pela autenticação no sistema
 * @author erivan <email>
 * @return mixed
 */
$routes->group('auth', function ($routes) {
    $routes->post('login', '\App\Controllers\Auth\AuthController::login');

    $routes->group('register', ['filter' => 'tokens'], function ($routes) {
        $routes->post('/', '\App\Controllers\Auth\AuthController::register');
    });
    
    $routes->group('logout', ['filter' => 'tokens'], function ($routes) {
        $routes->get('/', '\App\Controllers\Auth\AuthController::logout');
    });

});



/**
 * Admin Routes
 * @version 1.0.0
 * @description Rota Responsavel por listar todas as ações ligadas a administração (dashboard).
 * @author erivan <email>
 * @return mixed
 */
$routes->group('admin', ['filter' => 'tokens'], function ($routes) {
    $routes->get('dashboard', '\App\Controllers\Admin\Dashboard\DashboardController::index');
});


/**
 * Costumers Routes
 * @version 1.0.0
 * @description Rota Responsavel por listar todas as ações ligadas a cliente (criar, atualizar e deletar).
 * @author erivan <email>
 * @return mixed
 */
$routes->group('costumers', ['filter' => 'tokens'], function ($routes) {
    $routes->get('list', '\App\Controllers\Costumers\CustomersController::index');
    $routes->get('list/(:num)', '\App\Controllers\Costumers\CustomersController::show/$1');
    $routes->post('store/', '\App\Controllers\Costumers\CustomersController::store');
    $routes->put('update/(:num)', '\App\Controllers\Costumers\CustomersController::update/$1');
    $routes->delete('delete/(:num)', '\App\Controllers\Costumers\CustomersController::destroy/$1');
});

/**
 * Products Routes
 * @version 1.0.0
 * @description Rota Responsavel por listar todas as ações ligadas a produtos (criar, atualizar e deletar).
 * @author erivan <email>
 * @return mixed
 */
$routes->group('products', ['filter' => 'tokens'], function ($routes) {
    $routes->get('list', '\App\Controllers\Produtcs\ProdutcsController::index');
    $routes->get('details/(:num)', '\App\Controllers\Produtcs\ProdutcsController::show/$1');
    $routes->post('store/', '\App\Controllers\Produtcs\ProdutcsController::store');
    $routes->put('update/(:num)', '\App\Controllers\Produtcs\ProdutcsController::update/$1');
    $routes->delete('delete/(:num)', '\App\Controllers\Produtcs\ProdutcsController::destroy/$1');
});

$routes->get('health', '\App\Controllers\Util\HealthController::index');