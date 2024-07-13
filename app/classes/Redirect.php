<?php

namespace App\classes;

use JetBrains\PhpStorm\NoReturn;

class Redirect
{
    #[NoReturn] public static function to($url): void
    {
        header("Location: $url");
        exit();
    }
    #[NoReturn] public static function back(): void
    {
        $uri = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $uri");
        exit();
    }
}