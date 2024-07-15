<?php

namespace App\controllers;

use App\classes\Request;

class UserController
{
    public function login(){
        view('user.login');
    }
    public function postLogin(){
        $post = Request::get('post');
        beautify($post);
    }
    public function register(){
        view('user.register');
    }
    public function postRegister(){
        $post = Request::get('post');
        beautify($post);
    }
    public function logout(){

    }
}