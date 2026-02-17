<?php

require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

define('BASE_URL', $_ENV['BASE_URL']);

use App\Core\Router;

$router = new Router();
require __DIR__ . '/routes/web.php';
$router->dispatch();
