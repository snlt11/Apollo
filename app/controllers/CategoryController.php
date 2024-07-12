<?php

namespace App\controllers;

use App\classes\Request;

class CategoryController extends BaseController
{
    public function index(): void
    {
        view('admin/category/create');
    }
    public function store(): void
    {
        beautify(Request::oldValue("post","categoryName"));
    }
}