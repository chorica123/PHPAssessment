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
    $message = "";
    if(array_key_exists('submit', $_POST)) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $userId = $_SESSION['userid']; //$_POST['user_id'];
        // create object of post 
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->userId = $userId;
        $post->save();
        $test = "hello";
        // response
        $message = "<div class='alert alert-success'><strong>Action success!</strong> Post has been insert.</div>";
    }
   
?>

<div class="container">
    <?php include('header.php'); ?>
    <form action="" method="post">
        <div class="mb-3">
            <?php echo $message;?>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="ematitleil" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="content" name="content" style="height: 100px"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


