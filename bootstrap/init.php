<?php

$_SESSION ?? (session_status() === PHP_SESSION_NONE && session_start());

define("APP_ROOT", realpath(__DIR__.'/../'));
const URL_ROOT = 'http://localhost:8000/';

//Set public folder path localhost:8000 === 127.0.0.1:8000/public/

require_once(APP_ROOT."/vendor/autoload.php");

new \App\classes\ErrorHandler();

require_once(APP_ROOT."/app/config/_env.php");

new \App\classes\Database();

require_once(APP_ROOT."/app/routing/router.php");
