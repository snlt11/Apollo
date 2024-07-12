<?php

namespace App\classes;

use Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;

class ErrorHandler
{
    public function __construct()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();
    }
}