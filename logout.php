<?php
session_start();
unset($_SESSION["logged_in"]);
unset($_SESSION["userid"]);
unset($_SESSION["USERNAME"]);
header('Location: http://localhost/learn-php8.dev/php-assignment/blog/login.php');