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

/** VALIDATE */

function csrf_input(): string
{
    session()->csrf();
    return "<input type='hidden' name='csrf_token' value='" . (session()->csrf_token ?? "") . "'/>";
}

function csrf_verify(array $request): bool
{
    if(empty(session()->csrf_token) || empty($request['csrf_token']) || $request['csrf_token'] != session()->csrf_token){
        return false;
    }

    return true;
}

function session()
{
    return new \App\Core\Session();
}