<?php include './../lib/db.php';
$currentPage = 'index.php'; ?>
<?php include './cms.check-logged-in.php'; ?>

<?php

$rows = $db->getData("SELECT * FROM home_slideshow WHERE id = ?;", [$_GET['id']]);

if ($rows === 0) {
  exit('This image does not exist.');
}

$image = $rows[0];

if (!isset($_POST['submit'])) goto end;

require '../lib/validator.class.php';

/* check all input by validator */
$validation = new HomeSlideshowValidator($_POST);
$errors = $validation->validateForm();
if (count($errors)) goto end;

/* prepare image name */
if ($_FILES['upload']['name']) {
  ['saveUrl' => $saveUrl, 'readUrl' => $readUrl] = (prepareFileUrl($_FILES['upload']['name'], '../img/home-slideshow/', '../img/home-slideshow/'));
  $params = [$readUrl, $_POST['title'], $_POST['caption']];
  $query = "
    UPDATE 
      home_slideshow
    SET 
      img_url = ?,
      title = ?,
      caption = ?,
      img_order = ?
    WHERE
      id = '$image[id]';
  ";

  /* write image to server folder */
  if (!move_uploaded_file($_FILES['upload']['tmp_name'], $saveUrl)) {
    exit('An error occur while writting file to server.');
  };

} else {
  $params = [$_POST['title'], $_POST['caption']];
  $query = "
    UPDATE 
      home_slideshow
    SET 
      title = ?,
      caption = ?,
      img_order = ?
    WHERE
      id = '$image[id]';
  ";
}

$imgOrder = $image['img_order'];

if ($_POST['order'] !== "auto" && $_POST['order'] !== $image['img_order']) {

  if ($db->getData('SELECT * FROM home_slideshow WHERE img_order = ?;', [$_POST['order']]) !== 0) {
    $db->alterData("UPDATE home_slideshow SET img_order = ? WHERE img_order = ?", [$image['img_order'], $_POST['order']]);
  }

  $imgOrder = $_POST['order'];
}

$params[] = $imgOrder;

$db->alterData($query, $params);

header('Location: index.php');
exit();

end:
?>

<?php include './components/header.php'; ?>

<script src="./js/home.slideshow.add.js" type="module" defer></script>
<title>Edit slideshow image</title>

<?php include './components/navigation.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-lg-5 col-md-7 col-9 mx-auto mt-4">
      <h2 class="my-4">Edit image</h2>

      <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $image['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="form-group my-4">
          <div class="image-area mb-2">
            <?php
            if (!empty($image['img_url'])) {
              echo "<img class='img-fluid rounded shadow-sm mx-auto d-block' src='$image[img_url]' alt='image'>";
            }
            ?>
          </div>

          <label for="upload" class="file-upload btn btn-secondary btn-block rounded-pill border-0 py-2 shadow-sm">
            <i class="fa fa-upload mr-2"></i>Choose an image
            <input id="upload" type="file" name="upload">
          </label>
        </div>

        <?php
        if (isset($errors['upload'])) {
          echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[upload]</strong>
              </div>
            ";
        }
        ?>

        <div class="form-group">
          <label for="title">title:</label>
          <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($_POST['title'] ?? $image['title']); ?>">
        </div>

        <?php
        if (isset($errors['title'])) {
          echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[title]</strong>
              </div>
            ";
        }
        ?>

        <div class="form-group">
          <label for="caption">caption:</label>
          <textarea type="text" name="caption" id="caption" class="form-control"><?php echo htmlspecialchars($_POST['caption'] ?? $image['caption']); ?></textarea>
        </div>

        <?php
        if (isset($errors['caption'])) {
          echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[caption]</strong>
              </div>
            ";
        }
        ?>

        <div class="form-group">
          <label for="order">order:</label>
          <input type="text" name="order" id="order" class="form-control" value="<?php echo htmlspecialchars($_POST['order'] ?? $image['img_order']); ?>">
          <small>Note: auto is equivalent to stay unchanged</small>
        </div>

        <?php
        if (isset($errors['order'])) {
          echo "
              <div class='alert alert-danger' role='alert'>
                <strong>$errors[order]</strong>
              </div>
            ";
        }
        ?>

        <button class="btn btn-success btn-block mt-2 py-2 mb-1" name="submit">Save</button>
        <a class="btn btn-primary btn-block mt-2 py-2 mb-5" href="index.php">Back</a>
      </form>
    </div>
  </div>
</div>

<?php include './components/footer.php'; ?>