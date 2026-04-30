<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

define("APP_URL", $_ENV['APP_URL'] ?? "http://localhost/senac/projeto-senac");
define("APP_NAME", $_ENV['APP_NAME'] ?? "Projeto Senac");

define("APP_TIMEZONE", $_ENV['APP_TIMEZONE'] ?? "America/Sao_Paulo");

define("DB_CONNECTION", $_ENV['DB_CONNECTION'] ?? "mysql");
define("DB_HOST", $_ENV['DB_HOST'] ?? "db");
define("DB_PORT", $_ENV['DB_PORT'] ?? "3306");
define("DB_DATABASE", $_ENV['DB_DATABASE'] ?? "projeto");
define("DB_USERNAME", $_ENV['DB_USERNAME'] ?? "root");
define("DB_PASSWORD", $_ENV['DB_PASSWORD'] ?? "password");
define("DB_CHARSET", $_ENV['DB_CHARSET'] ?? "utf8mb4");

define("EMAIL_SEND", $_ENV['EMAIL_SEND'] ?? "contato@suaempresa.com.br");
define("EMAIL_NAME", $_ENV['EMAIL_NAME'] ?? "Equipe Técnica do Projeto");
define("USERNAME_SENDGRID", $_ENV['USERNAME_SENDGRID'] ?? "apikey");
define("PASSWORD_SENDGRID", $_ENV['PASSWORD_SENDGRID'] ?? "secret");

define("APP_DEVELOPER", $_ENV['APP_DEVELOPER'] ?? "Seu Nome Aqui");

const UPLOAD_PATH = __DIR__ . "/../storage/uploads";