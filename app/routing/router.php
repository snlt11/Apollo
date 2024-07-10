<?php

$router = new AltoRouter();

$router->map('GET', '/users/[a:name]/[i:id]', 'IndexController@index','Index');

$match = $router->match();

if ($match) {
    echo "Matched Route: ". $match['name']. "<br>";
    echo "<pre>".print_r($match, true)."</pre>";
}else{
    echo "No route found";
}

