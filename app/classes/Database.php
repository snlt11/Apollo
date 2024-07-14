<?php

namespace App\classes;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
class Database
{
    public function __construct()
    {
        $capsule = new DB;

        $capsule->addConnection([
            'driver' => $_ENV['DB_CONNECTION'],
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}