<?php

namespace App\controllers;

class CategoryController extends BaseController
{
    public function index(): void
    {
        view('admin/category/create');
    }
    public function store(): void
    {
        beautify($_POST);
    }
}