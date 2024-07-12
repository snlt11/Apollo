<?php

namespace App\classes;

use Random\RandomException;

class CSRFToken
{
    /**
     * @throws RandomException
     */
    public static function __token()
    {
        if(!Session::has('token')) {
            $token = bin2hex(random_bytes(32));
            Session::set('token', $token);
        }else {
            $token = Session::get('token');
        }
        return $token;

    }
    public static function checkToken($token): bool
    {
        return Session::has('token') == $token;
    }
    public static function validate($token, $storedToken): bool
    {
        return hash_equals($token, $storedToken);
    }

}