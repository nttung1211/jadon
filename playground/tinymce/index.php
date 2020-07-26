<?php 
if (isset($_POST['submit'])) {
  echo $_POST['content'];
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- <script src="https://cdn.tiny.cloud/1/upa5c8dib31chpedm7owqf0egx2xqzsrinng8rw6yg58t6ya/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script src="./tinymce/js/tinymce/tinymce.min.js" defer></script>
  <script src="script.js" defer></script>
</head>

<body>
  <form action="index.php" method="post">
    <textarea name="content">Next, use our Get Started docs to setup Tiny!</textarea>
    <button name="submit">submit</button>
  </form>
</body>

</html>