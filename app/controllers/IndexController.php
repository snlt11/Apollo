<?php

namespace App\Controllers;

use App\classes\Session;

class IndexController extends BaseController
{
    public function index(){
        view('welcome');
    }
}