<?php
use Philo\Blade\Blade;
function view($path,$data=[])
{
    $views = APP_ROOT."/resources/views/";
    $cache = APP_ROOT."/bootstrap/cache";
    $blade = new Blade($views, $cache);
    echo $blade->view()->make($path,$data)->render();
}

function beautify($data): void
{
    echo "<pre>". print_r($data, true)."</pre>";
}

function assetsLink($link): void
{
    echo URL_ROOT.'assets/'.$link;
}
