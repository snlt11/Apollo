<?php


require_once("../bootstrap/init.php");
use Illuminate\Database\Capsule\Manager as Capsule;
new \App\classes\Database();
$users = Capsule::table('users')->get();

echo "<pre>" .print_r($users, true). "</pre>";
