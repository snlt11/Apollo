<?php

namespace App\classes;

class Request
{
    public static function allValues($is_array = false)
    {
        $key = [
            'post' => $_POST,
            'get' => $_GET,
            'files' => $_FILES,
        ];
        return json_decode(json_encode($key), $is_array);
    }
    public static function get($key){
        $values = self::allValues();
        return $values->$key ?? null;
    }
    public static function has($key): bool
    {
        $values = self::allValues(true);
        return array_key_exists($key, $values);
    }
    public static function oldValue($key,$value)
    {
        $values = self::allValues();
        return $values->$key->$value ?? "";
    }
    public static function refresh(): void
    {
        $_POST = $_GET = $_FILES = [];
    }
}