<?php include './../lib/db.php';
$currentPage = 'managers.php'; ?>
<?php include './cms.check-logged-in.php'; ?>

<?php

$rows = $db->getData("SELECT * FROM managers WHERE id = ?;", [$_GET['id']]);

if ($rows === 0) {
  exit('This manager does not exist.');
}

$manager = $rows[0];

if (!isset($_POST['submit'])) goto end;

require '../lib/validator.class.php';
$validation = new AddManagerValidator($_POST);
$errors = $validation->validateForm();

if (count($errors)) goto end;

$rows = $db->getData("SELECT * FROM managers WHERE username = ?;", [$_POST['username']]);

if ($rows !== 0 && $rows[0]['username'] !== $manager['username']) {
  $errors['username'] = 'This username has been taken.';
  goto end;
}

$rows = $db->getData("SELECT * FROM managers WHERE email = ?;", [$_POST['email']]);

if ($rows !== 0 && $rows[0]['email'] !== $manager['email']) {
  $errors['email'] = 'This email has been used.';
  goto end;
}

$level = $manager['level'] === 'super-admin' ? 'super-admin' : $_POST['level'];

if ($_FILES['upload']['name']) {
  ['saveUrl' => $saveUrl, 'readUrl' => $readUrl] = (prepareFileUrl($_FILES['upload']['name'], '../img/managers/', '../img/managers/'));
  $db->alterData(
    "UPDATE
      managers
    SET 
      fullname = ?,
      username = ?,
      password = ?,
      email = ?,
      level = ?,
      img_url = ?
    WHERE 
      id = ?;",
    [
      $_POST['fullname'],
      $_POST['username'],
      $_POST['password'],
      $_POST['email'],
      $level,
      $readUrl,
      $manager['id']
    ]
  );

  if ($saveUrl && !move_uploaded_file($_FILES['upload']['tmp_name'], $saveUrl)) {
    exit('An error occur while writting file to server.');
  };
} else {
  $db->alterData(
    "UPDATE
      managers
    SET 
      fullname = ?,
      username = ?,
      password = ?,
      email = ?,
      level = ?
    WHERE 
      id = ?;",
    [
      $_POST['fullname'],
      $_POST['username'],
      $_POST['password'],
      $_POST['email'],
      $level,
      $manager['id']
    ]
  );
}

header('Location: managers.php');
exit();

end:
?>

<?php include './components/header.php'; ?>

<script src="./js/managers.add.js" type="module" defer></script>
<title>Edit manager</title>

<?php include './components/navigation.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-lg-5 col-md-7 col-9 mx-auto mt-4">
      <h2 class="my-4">Edit manager</h2>

      <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $manager['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fullname">Fullname:</label>
          <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo htmlspecialchars($_POST['fullname'] ?? $manager['fullname']); ?>">
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
          <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? $manager['username']); ?>">
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
          <input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($_POST['password'] ?? $manager['password']); ?>">
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
          <input type="text" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? $manager['email']); ?>">
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

        <?php if ($manager['level'] !== 'super-admin') { ?>
          <div class="form-group">
            <label for="level">Level:</label>
            <select name="level" id="level" class="custom-select">
              <option <?php echo (isset($_POST['level']) && ($_POST['level'] === 'manager')) || $manager['level'] === 'manager' ? 'selected' : ''; ?> value="manager">Manager</option>
              <?php
              if ($_SESSION['jadon_loggedIn']['level'] === 'super-admin') {
                $selected = (isset($_POST['level']) && ($_POST['level'] === 'admin')) || $manager['level'] === 'admin' ? 'selected' : '';
                echo "<option $selected value='admin'>Admin</option>";
              };
              ?>
            </select>
          </div>
        <?php } ?>

        <div class="form-group my-4">
          <div class="image-area mb-2">

            <?php
            if (isset($_POST['img_url']) && !empty($_POST['img_url'])) {
              $src = htmlspecialchars($_POST['img_url']);
              echo "<img class='img-fluid rounded shadow-sm mx-auto d-block' src='$src' alt='image'>";
            } elseif (!empty($manager['img_url'])) {
              echo "<img class='img-fluid rounded shadow-sm mx-auto d-block' src='$manager[img_url]' alt='image'>";
            }
            ?>

          </div>

          <label for="upload" class="file-upload btn btn-secondary btn-block rounded-pill border-0 py-2 shadow-sm">
            <i class="fa fa-upload mr-2"></i>Choose an image
            <input id="upload" type="file" name="upload">
          </label>
        </div>

        <button class="btn btn-success btn-block mt-2 py-2 mb-1" name="submit">Save changes</button>
        <a class="btn btn-primary btn-block mt-2 py-2 mb-5" href="managers.php">Back</a>
      </form>
    </div>
  </div>
</div>

<?php include './components/footer.php'; ?>