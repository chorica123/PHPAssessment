<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .site-header {
            background-color: rgba(0, 0, 0, .85);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            backdrop-filter: saturate(180%) blur(20px);
        }
        .site-header a {
            color: #8e8e8e;
            transition: color .15s ease-in-out;
        }
        .site-header a:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href='home.php'>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts.php">Post</a>
                </li>
            </ul>
            <div class="col-4 text-center">
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <p style="margin: 5px; color: #fff;"><?php echo $_SESSION['USERNAME']; ?></p>
                <a class="btn btn-sm btn-outline-secondary" href="logout.php">Sing out</a>
            </div>
        </nav>
    </header>
    <br>
</body>
</html>