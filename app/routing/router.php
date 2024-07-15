<?php

use App\Routing\RouterDispatcher;

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@index', 'Index');

//Admin Route
$router->map('GET', '/admin', 'App\Controllers\AdminController@index', 'Admin');
$router->map('GET', '/admin/category/create', 'App\controllers\CategoryController@index', 'Category');
$router->map('POST', '/admin/category/create', 'App\Controllers\CategoryController@store', 'Category Store');
$router->map('GET', '/admin/category/[i:id]/delete', 'App\Controllers\CategoryController@delete', 'Category Delete');

new RouterDispatcher($router);
