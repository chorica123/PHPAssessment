<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Blog\Models\Login;

if(array_key_exists('submit', $_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "")
    {
        $register = new Login();
        $register->username = $name;
        $register->email = $email;
        $register->password = md5($password);
        $register->register();

        // response
        echo "Register successfully.";
        $_SESSION['logged_in'] = true;
        $_SESSION['USERNAME'] = $name;
        header('Location: http://localhost/learn-php8.dev/php-assignment/blog/home.php');
    }
}
   
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <form  action="" method="post">
                <div class="mb-3">
                    <br>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" required> 
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

