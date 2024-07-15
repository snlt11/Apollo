<?php

namespace App\classes;

use App\models\User;

class Auth
{
    public static function check(): bool
    {
        return Session::has('user_id');
    }
    public static function user(){
        $user = User::find(Session::get('user_id'));
        return $user;
    }
}