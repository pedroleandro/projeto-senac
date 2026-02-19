<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

function url(?string $path = null): string
{
    if(strpos($_SERVER['HTTP_HOST'], 'localhost')){
        if($path){
            return $_ENV['URL_HOMOLOG'] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }

        return $_ENV['URL_HOMOLOG'];
    }

    if($path){
        return $_ENV['URL_PROD'] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return $_ENV['URL_PROD'];
}

function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: $url");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
}
