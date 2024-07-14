<?php

namespace App\controllers;

use App\classes\CSRFToken;
use App\classes\FileUpload;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;

class CategoryController extends BaseController
{
    public function index(): void
    {
        view('admin/category/create');
    }

    /**
     * @throws \Exception
     */
    public function store(): void
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post)){
            beautify(Request::allValues());
        }else{
            Session::flashMessage('error', 'Invalid CSRF token. Please try again');
            Redirect::back();
        }
    }
}