<?php

use app\Router;
use app\Database;
use app\controllers\ProductController;
use app\models\God;

require_once __DIR__ . '/../vendor/autoload.php';

$database = new Database();
$product_god = new God();

$router = new Router($database,$product_god);

$router->get('/', [ProductController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/list', [ProductController::class, 'index']);
$router->post('/products/list/delete', [ProductController::class, 'delete']);

$router->get('/products/new', [ProductController::class, 'new']);
$router->post('/products/new', [ProductController::class, 'new']);

$router->resolve();




