<?php include '../lib/db.php'; ?>

<?php

if (isset($_POST['submit'])) {
  require '../lib/validator.class.php';

  $validation = new LoginValidator($_POST);
  $errors = $validation->validateForm();

  if (!count($errors)) {
    $rows = $db->getData("SELECT * FROM managers WHERE username = ?", [$_POST['username']]);
    if ($rows === 0) {
      $errors['username'] = 'Username does not exist.';
    } else {
      $user = $rows[0];
      if ($user['password'] !== $_POST['password']) {
        $errors['password'] = 'Wrong password.';
      } else {
        $_SESSION['jadon_loggedIn'] = $user;
        header('Location: index.php');
        exit();
      }
    }
  }
}

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
  <link rel="stylesheet" href="css/cms.login.css">

  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-7 col-9 rounded" id="formWrapper">
        <h1 class="my-5 text-center">Welcome!</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="form-group">
            <!-- <label for="username"></label> -->
            <i class="fas fa-user"></i>
            <input autocomplete="off" placeholder="Username" type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
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
            <label for="password"></label>
            <i class="fas fa-lock"></i>
            <input placeholder="Password" type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>">
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

          <button class="btn btn-primary btn-block rounded-pill shadow" name="submit">Login</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>