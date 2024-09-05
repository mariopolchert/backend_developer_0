<?php

use Controllers\genres\GenresController;
use Controllers\members\MembersController;
use Controllers\HomeController;
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\RegisterController;
use Controllers\PricesController;
use Core\Router;

/** @var Router $router */
$router->get('/', [HomeController::class, 'index']);
$router->get('/dashboard', [DashboardController::class, 'index', 'auth']);

$router->get('/register', [RegisterController::class, 'create', 'guest']);
$router->post('/register', [RegisterController::class, 'store', 'guest']);

$router->get('/login', [LoginController::class, 'create']);
$router->post('/login', [LoginController::class, 'store']);
$router->delete('/logout', [LoginController::class, 'logout'])->with('guest');

$router->get('/genres', [GenresController::class, 'index']);
$router->get('/genres/show', [GenresController::class, 'show']);
$router->get('/genres/create', [GenresController::class, 'create']);
$router->post('/genres', [GenresController::class, 'store']);
$router->get('/genres/edit', [GenresController::class, 'edit']);
$router->patch('/genres', [GenresController::class, 'update']);
$router->delete('/genres/destroy', [GenresController::class, 'destroy']);

$router->get('/members',            [MembersController::class, 'index']);
$router->get('/members/show',       [MembersController::class, 'show']);
$router->get('/members/create',     [MembersController::class, 'create']);
$router->post('/members/store',     [MembersController::class, 'store']);
$router->get('/members/edit',       [MembersController::class, 'edit']);
$router->patch('/members/update',   [MembersController::class, 'update']);
$router->delete('/members/destroy', [MembersController::class, 'destroy']);

$router->get('/prices',             [PricesController::class, 'index']);
$router->get('/prices/show',        [PricesController::class, 'show']);
$router->get('/prices/create',      [PricesController::class, 'create']);
$router->post('/prices',            [PricesController::class, 'store']);
$router->get('/prices/edit',        [PricesController::class, 'edit']);
$router->patch('/prices',           [PricesController::class, 'update']);
$router->delete('/prices/destroy',  [PricesController::class, 'destroy']);

