<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";

use App\Core\Session;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

$session = new Session();
require __DIR__ . '/routes/web.php';

ob_end_flush();
