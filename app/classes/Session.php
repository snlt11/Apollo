<?php

namespace App\classes;

class Session
{
    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }
    public static function set($key, $value): void
    {
        if(!self::has($key)){
            $_SESSION[$key] = $value;
        }else{
            echo "Session variable $key already exists.";
        }
    }
    public static function unset($key): void
    {
        if(self::has($key)){
            unset($_SESSION[$key]);
        }
    }
    public static function get($key, $default = null){
        return self::has($key) ? $_SESSION[$key] : $default;
    }
    public static function replace($key, $value): void
    {
        if(self::has($key)) {
            self::unset($key);
        }
        self::set($key, $value);
    }
    public static function flashMessage($key, $value = ""): void
    {
        if (!empty($value)) {
            self::replace($key, $value);
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>".self::get($key)."</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                   </div>";
            self::unset($key);
        }
    }

}