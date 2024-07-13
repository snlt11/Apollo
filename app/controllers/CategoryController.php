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

    public function store(): void
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post)){
            $uploadFile = new FileUpload();
            beautify(Request::get('files'));

            echo "<hr>";

            var_dump($uploadFile->moveUploadFile(Request::get('files')));
            beautify($post->csrf_token);
        }else{
            Session::flashMessage('error', 'Invalid CSRF token. Please try again');
            Redirect::back();
        }
    }
}