<?php
    session_start();
    require_once __DIR__.'/vendor/autoload.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(!isset($_SESSION['logged_in'])) {    
        header('Location: http://localhost/learn-php8.dev/php-assignment/blog/login.php');
        return;
    }

    use Blog\Models\Post;
    $post = new Post;
    $post->publish($_GET['id'],1);

    // response
    header('Location: http://localhost/learn-php8.dev/php-assignment/blog/posts.php');
?>