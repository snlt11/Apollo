<?php

use App\Routing\RouterDispatcher;

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@index', 'Index');

//Admin Route
$router->map('GET', '/admin', 'App\Controllers\AdminController@index', 'Admin');
$router->map('GET', '/admin/category/create', 'App\controllers\CategoryController@index', 'Category');
$router->map('POST', '/admin/category/create', 'App\Controllers\CategoryController@store', 'Category Store');
$router->map('GET', '/admin/category/[i:id]/delete', 'App\Controllers\CategoryController@delete', 'Category Delete');

//User Route
$router->map('GET','/user/login', 'App\Controllers\UserController@login', 'Login');
$router->map('POST','/user/login', 'App\Controllers\UserController@postLogin', 'Login Post');
$router->map('GET','/user/register', 'App\Controllers\UserController@register','Register');
$router->map('POST','/user/register', 'App\Controllers\UserController@postRegister','Register Post');
$router->map('GET','/user/logout', 'App\Controllers\UserController@logout', 'Logout');

new RouterDispatcher($router);
