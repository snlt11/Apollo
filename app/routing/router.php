<?php

use App\Routing\RouterDispatcher;

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@index', 'Index');


new RouterDispatcher($router);
