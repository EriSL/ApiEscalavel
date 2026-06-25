<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Costumers\CustomersController;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


/**
 * Costumers Routes
 * @version 1.0.0
 * @description Rota Responsavel por listar todas as ações ligadas a cliente (criar, atualizar e deletar).
 * @author erivan <email>
 * @return mixed
 */
$routes->group('costumers', function ($routes) {
    $routes->get('list', 'CustomersController::index');
    $routes->get('(:num)', 'CustomersController::show/$1');
    $routes->post('/', 'CustomersController::store');
    $routes->put('(:num)', 'CustomersController::update/$1');
    $routes->delete('(:num)', 'CustomersController::destroy/$1');
});
