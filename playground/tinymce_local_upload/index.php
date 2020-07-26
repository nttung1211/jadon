<?php
if (isset($_POST['submit'])) {
  echo htmlspecialchars($_POST['content']);
  // echo $_POST['content'];
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap and jquery -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- tinymce -->
  <script src="tinymce/tinymce.min.js"></script>
  
  <script src="script.js" defer></script>
  <title>Document</title>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 mx-auto mt-5">
      <form action="index.php" method="post">
        <div class="form-group">
          <textarea id="myTextarea" name='content'></textarea>
        </div>
        <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
  
</body>
</html>