<?php include '../lib/db.php'; ?>

<?php

if (!isset($_POST['submit'])) goto end;

require '../lib/validator.class.php';
$validation = new AddManagerValidator($_POST);
$errors = $validation->validateForm();

if (count($errors)) goto end;

$rows = $db->getData("SELECT * FROM managers WHERE username = ?;", [$_POST['username']]);

if ($rows !== 0) {
  $errors['username'] = 'This username has been taken.';
  goto end;
}

$rows = $db->getData("SELECT * FROM managers WHERE email = ?;", [$_POST['email']]);

if ($rows !== 0) {
  $errors['email'] = 'This email has been used.';
  goto end;
}

if ($_FILES['upload']['name']) {
  ['saveUrl' => $saveUrl, 'readUrl' => $readUrl] = (prepareFileUrl($_FILES['upload'], '../img/managers/', '../img/managers/'));
} else {
  $saveUrl = '';
  $readUrl = '';
}

if ($saveUrl && !move_uploaded_file($_FILES['upload']['tmp_name'], $saveUrl)) {
  exit('An error occur while writting file to server.');
};

$db->alterData("
  INSERT INTO 
    managers
  SET 
    fullname = ?,
    username = ?,
    password = ?,
    email = ?,
    level = ?,
    img_url = ?;
", [
  $_POST['fullname'],
  $_POST['username'],
  $_POST['password'],
  $_POST['email'],
  $_POST['level'],
  $readUrl
]);

header('Location: managers.php');
exit();

end:
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../lib/css/all.min.css">
  <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
  <script src="../lib/js/jquery.slim.min.js" defer></script>
  <script src="../lib/js/bootstrap.bundle.min.js" defer></script>

  <link rel="stylesheet" href="css/global.css">
  <script src="js/add-manager.js" type="module" defer></script>
  <title>Add manager</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-7 col-9 mx-auto mt-4">
        <h2 class="my-4">Add manager</h2>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo htmlspecialchars($_POST['fullname'] ?? ''); ?>">
          </div>

          <?php
          if (isset($errors['fullname'])) {
            echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[fullname]</strong>
              </div>
            ";
          }
          ?>

          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
          </div>

          <?php
          if (isset($errors['username'])) {
            echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[username]</strong>
              </div>
            ";
          }
          ?>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>">
          </div>

          <?php
          if (isset($errors['password'])) {
            echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[password]</strong>
              </div>
            ";
          }
          ?>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
          </div>

          <?php
          if (isset($errors['email'])) {
            echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[email]</strong>
              </div>
            ";
          }
          ?>

          <div class="form-group">
            <label for="level">Level:</label>
            <select name="level" id="level" class="custom-select">
              <option <?php echo isset($_POST['level']) && ($_POST['level'] === 'manager') ? 'selected' : ''; ?> value="manager">Manager</option>
              <option <?php echo isset($_POST['level']) && ($_POST['level'] === 'admin') ? 'selected' : ''; ?> value="admin">Admin</option>
            </select>
          </div>

          <div class="form-group my-4">
            <div class="image-area mb-2"></div>

            <label for="upload" class="file-upload btn btn-secondary btn-block rounded-pill border-0 py-2 shadow-sm">
              <i class="fa fa-upload mr-2"></i>Choose an image
              <input id="upload" type="file" name="upload">
            </label>
          </div>

          <button class="btn btn-success btn-block mt-2 py-2 mb-1" name="submit">Add</button>
          <a class="btn btn-primary btn-block mt-2 py-2 mb-5" href="managers.php">Back</a>
        </form>
      </div>
    </div>
  </div>

</body>

</html>