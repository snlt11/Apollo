<?php

namespace App\Controllers;

class IndexController
{
    public function index(){
        echo "Welcome to the Index Controller!";
        view('welcome');
    }
}