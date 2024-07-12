<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index(){
        view('welcome');
    }
}