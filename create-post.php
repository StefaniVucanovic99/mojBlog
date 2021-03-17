<?php
include('db.php');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $author = $_POST['author'];
  $created_at_raw = htmlentities($_POST['created_at']);
  $created_at = date('Y-m-d', (strtotime($created_at_raw)));
  $sql = "INSERT INTO posts (title, body, author, created_at) VALUES ('$title', '$body', '$author', '$created_at')";
  insertIntoDB($connection, $sql);
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

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

<body class="va-l-page va-l-page--single">
  <main role="main" class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
        <form method="POST" action="create-post.php">
          <div class="u-gap-bottom">
            <label>Title</label>
            <input type="text" name="title">
          </div>

          <div class="u-gap-bottom">
            <label>Content</label>
            <textarea name="body"></textarea>
          </div>

          <div class="u-gap-bottom">
            <label>Created at</label>
            <input type="date" name="created_at">
          </div>

          <div class="u-gap-bottom">
            <label>Author</label>
            <input type="text" name="author">
          </div>

          <div class="u-gap-bottom">
            <button>Submit</button>
          </div>
        </form>
      </div>
      <?php
      include('sidebar.php');
      ?>
    </div>
  </main><!-- /.container -->
  <?php
  include('footer.php');
  ?>
</body>

</html>