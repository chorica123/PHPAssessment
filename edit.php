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

if(array_key_exists('update', $_POST)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_POST['user_id'];

    //
    $post = Post::show($_GET['id']);
    // update attibute in  object of post 
    
    $post->title = $title;
    $post->content = $content;
    $post->update();

    // response
    header('Location: http://localhost/learn-php8.dev/php-assignment/blog/posts.php');
}
    $post = null;
    if(isset($_GET['id'])) {
        $post = Post::show($_GET['id']);
    }
    
?>

<div class="container">
    <?php include('header.php'); ?>
    <form action="" method="post">
        <input type="hidden" name="id" value='<?php echo $post->id;?>'>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="ematitleil" class="form-control" id="title" name="title" value='<?php echo $post->title;?>'>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="content" name="content" style="height: 100px"><?php echo $post->content;?></textarea>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $post->userId;?>">
        <button type="submit" name="update" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


