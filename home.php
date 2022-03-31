
<?php 
    session_start();
    use Blog\Models\Post;

    require_once __DIR__ . '/vendor/autoload.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if(!isset($_SESSION['logged_in'])) {    
        header('Location: http://localhost/learn-php8.dev/php-assignment/blog/login.php');
        return;
    }
    $posts = Post::getPublishPost();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php include('header.php'); ?>
        <main>
            <?php foreach($posts as $post) { ?>
                <div class="album bg-light">
                    <div class="row row-cols-2 row-cols-sm-12 row-cols-md-12">
                        <div class="col">
                            <div class="card-body">
                                <h2><?php echo $post['title']; ?></h2>
                                <p class="card-text"><?php echo $post['content'];?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted" style="font-size: 10px;"><?php $timestamp = strtotime($post['publish_date']); $date = date("d-M-Y", $timestamp);echo $date;?></p>
                                    <p class="text-muted" style="font-size: 10px;"><?php echo $post['user_name'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </main>
    </div>
</body>
</html>