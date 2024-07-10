<?php


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(APP_ROOT);

$dotenv->load();