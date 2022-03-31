<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/vendor/autoload.php';

if(!isset($_SESSION['logged_in'])) {    
    header('Location: http://localhost/learn-php8.dev/php-assignment/blog/login.php');
    return;
}