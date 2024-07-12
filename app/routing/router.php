<?php

use App\Routing\RouterDispatcher;

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@index', 'Index');

//Admin Route
$router->map('GET', '/admin', 'App\Controllers\AdminController@index', 'Admin');
$router->map('GET', '/admin/category/create', 'App\controllers\CategoryController@index', 'Category');
$router->map('POST', '/admin/category/create', 'App\Controllers\CategoryController@store', 'Category Store');

new RouterDispatcher($router);
