<?php

use \CoffeeCode\Router\Router;

$router = new Router(url(), "@");

$router->namespace("App\Controllers");
$router->get('/', 'HomeController@home');
$router->get('/login', 'UserController@login');

$router->namespace('App\Controllers')->group('/error');
$router->get('/{errorCode}', 'HomeController@error');

$router->dispatch();

if ($router->error()) {
    redirect("/error/{$router->error()}");
}