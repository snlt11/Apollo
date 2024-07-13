<?php

use App\classes\Session;

require_once("../bootstrap/init.php");
$validator = new App\classes\ValidationRequest();
$user = $validator->mixed('test');
var_dump($user);
