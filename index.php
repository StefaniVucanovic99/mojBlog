<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php 
    include('header.php');
    include_once('db.php');
    ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
        <?php 
            $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3";
            $posts = getDataFromDatabase($connection, $sql);
            // var_dump($posts);
            

            foreach ($posts as $post) {

            
        ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo ($post['Id']) ?>"> <?php echo $post['Title'];?></a></h2>
                <p class="blog-post-meta"><?php echo $post['Created_at']?> by <a href="#"><?php echo $post['Author']?></a></p>

                <p><?php echo $post['Body']?></p>
            </div><!-- /.blog-post -->
            <?php } ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include('sidebar.php') ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php')?>
</body>
</html>