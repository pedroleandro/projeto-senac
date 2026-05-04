<?php

namespace App\Core;

class Message
{
    private const KEY = '_flash';

    public static function success(string $message, string $label = null): void
    {
        self::set('success', $message, $label ?? 'Sucesso:');
    }

    public static function error(string $message, string $label = null): void
    {
        self::set('error', $message, $label ?? 'Erro:');
    }

    public static function warning(string $message, string $label = null): void
    {
        self::set('warning', $message, $label ?? 'Atenção:');
    }

    public static function info(string $message, string $label = null): void
    {
        self::set('info', $message, $label ?? 'Informação:');
    }

    public static function get(): ?array
    {
        if (!empty($_SESSION[self::KEY])) {
            $flash = $_SESSION[self::KEY];
            unset($_SESSION[self::KEY]);
            return $flash;
        }

        return null;
    }

    private static function set(string $type, string $message, string $label): void
    {
        $_SESSION[self::KEY][] = [
            'type' => $type,
            'message' => $message,
            'label' => $label,
        ];
    }
}