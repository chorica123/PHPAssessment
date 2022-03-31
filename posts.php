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
    if (isset($_GET['page'])) {
        $pageno = $_GET['page'];
    } else {
        $pageno = 1;
    }
    $per_page = 5;
    $offset = ($pageno - 1) * $per_page;
    $prev = $pageno - 1;
    $next = $pageno + 1;
    //$posts = Post::all($pageno);
    $userid = $_SESSION['userid'];
    $posts = Post::all($userid,$per_page,$offset);
    $total_pages = Post::getTotal($userid,$per_page);

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
    <a href="create.php" class="btn btn-sm btn-success">Create</a>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post) { ?>
                        <tr>
                            <th scope="row"><?php echo $post['id'];?></th>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['content']; ?></td>
                            <td><input type="checkbox" disabled 
                            <?php 
                                if($post['publish'] == 1){
                                    echo 'checked';
                                }else{
                                    echo '';
                                }
                            ?>></td>
                            <td style="width: 110px">
                                <a href="edit.php?id=<?php echo $post['id'];?>" data-toggle="tooltip" title="Edit" ><i class="fas fa-edit"></i></a> |
                                <a href="publish.php?id=<?php echo $post['id'];?>" onClick="return confirm('Are you sure you want to publish this post?')" ata-toggle="tooltip" title="Publish" ><i class="fas fa-arrow-up"></i></a> |
                                <a href="unpublish.php?id=<?php echo $post['id'];?>" onClick="return confirm('Are you sure you want to unpublish this post?')" ata-toggle="tooltip" title="Unpublish" ><i class="fas fa-arrow-down"></i></a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <!-- Pagination -->
                <nav aria-label="Page navigation example mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($pageno <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                        </li>
                        <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
                        <li class="page-item <?php if($pageno == $i) {echo 'active'; } ?>">
                            <a class="page-link" href="posts.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?php if($pageno >= $total_pages) { echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($pageno >= $total_pages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>