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
function slug($value): string|null
{
    // Replace special characters with blank, except underscore, letters, and numbers
    $value = preg_replace('/[^\pL\pN\s_]+/u', '', $value);

    // Replace spaces with dashes and trim any surrounding whitespace
    $value = preg_replace('/\s+/u', '-', $value);

    // Convert to lowercase
    return strtolower(trim($value, '-'));
}

