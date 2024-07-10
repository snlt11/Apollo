<?php

use App\Routing\RouterDispatcher;

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\TestController@test', 'Index');


new RouterDispatcher($router);
