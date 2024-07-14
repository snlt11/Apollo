<?php

namespace App\controllers;

use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Request;
use App\classes\Session;
use App\models\Category;

class CategoryController extends BaseController
{
    public function index(): void
    {
        $categories = Category::all();
        view('admin/category/create',compact('categories'));
    }

    public function store(): void
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post)){
            $rules = [
                "name" => ['required' => true, 'minLength' => 4, 'maxLength' => 15, 'unique' => 'categories'],
            ];
            $validation = new \App\classes\ValidationRequest();
            $validation->checkValidate($post,$rules);
            if($validation->hasErrors()){
                $categories = Category::all();
                $errors = $validation->getErrors();
                view('admin/category/create',compact('categories','errors'));
            }else{
                echo "Category created successfully";
            }
        }else{
            Session::flashMessage('error', 'Invalid CSRF token. Please try again');
            Redirect::back();
        }
    }
}