<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

/** @var $router */
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [UserController::class, 'login']);