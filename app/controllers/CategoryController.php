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
        $categories = Category::all()->count();
        list($categories, $pages) = pagination(3, $categories, new Category());
        $categories = json_decode(json_encode($categories));
        view('admin/category/create',compact('categories','pages'));
    }

    public function store(): void
    {
        $post = Request::get('post');
        if(CSRFToken::checkToken($post)){
            $rules = [
                "name" => ['required' => true, 'minLength' => 2, 'maxLength' => 15, 'unique' => 'categories'],
            ];
            $validation = new \App\classes\ValidationRequest();
            $validation->checkValidate($post,$rules);
            if($validation->hasErrors()){
                $categories = Category::all();
                $errors = $validation->getErrors();
                view('admin/category/create',compact('categories','errors'));
            }else{
                $slug = slug($post->name);
                $result = Category::create([
                    "name" => $post->name,
                    "slug" => $slug,
                ]);
                if($result){
                    $categories = Category::all();
                    $success = ['Category created successfully'];
                    view('admin/category/create',compact('categories','success'));
                }else{
                    Session::flashMessage('error', 'Failed to create category');
                    Redirect::back();
                }
            }
        }else{
            Session::flashMessage('error', 'Invalid CSRF token. Please try again');
            Redirect::back();
        }
    }

    public function delete($id): void
    {
        $result = Category::destroy($id);
        if($result){
            Session::flashMessage('success', 'Category deleted successfully');
            Redirect::to('/admin/category/create');
        }else{
            Session::flashMessage('error', 'Failed to delete category');
            Redirect::back();
        }

    }

}