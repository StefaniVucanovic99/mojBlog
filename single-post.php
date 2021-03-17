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

<?php include('header.php')?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

        <?php 
            include_once('db.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['post_id'];
                if($_POST['Text'] != '' && $_POST['Author'] != '') {
                    $newComment = "INSERT INTO comments (Post_id, Author, Text) VALUES ($id, '{$_POST['Author']}', '{$_POST['Text']}');";
                    insertIntoDB($connection, $newComment);
                }

            } else {

                $id = $_GET['post_id'];
            }
            $sql = "SELECT * FROM posts WHERE Id = $id";
            $post = getSinglePostData($connection, $sql);


        ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><a href='single-post.php&'><?php echo $post['Title'];?></a></h2>
                <p class="blog-post-meta"><?php echo $post['Created_at']?> by <a href="#"><?php echo $post['Author']?></a></p>

                <p><?php echo $post['Body']?></p>
            </div><!-- /.blog-post -->

            <div class="blog-post-comment-form">
                <form action="single-post.php?post_id =<?php echo $id?>" method="post">
                    Ime:<input type="text" name="Author"><br>
                    Text:<input type="text" name="Text"><br>
                    <input type="hidden" name="post_id" value="<?php echo $id?>">
                    <input type="submit" value="Submit">
                </form>
            </div>


            <?php include('comments.php') ?>


        </div><!-- /.blog-main -->

        <?php include('sidebar.php') ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php')?>
</body>
</html>