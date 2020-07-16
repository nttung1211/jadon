<?php require 'lib/db.php';
$currentPage = 'services.php' ?>
<?php
$rows = $db->getData("SELECT * FROM services ORDER BY created_at DESC;");
?>
<?php require 'components/header.php'; ?>
<link rel="stylesheet" href="css/services.css">
<title>Services</title>
<?php require 'components/navigation.php'; ?>

<div class="container sercives-container">
  <div class="row">
  <?php 
  if ($rows !== 0) {
    foreach ($rows as $row) {
      echo "
        <div class='col-md-6'>
          <div class='card border-0 shadow-sm'>
            <img src='$row[img_url]' class='card-img-top' alt='...'>
            <div class='card-body text-center'>
              <h5 class='card-title mb-0'>$row[title]</h5>
              <div class='card-text text-black-50'>$row[subtitle]</div>
              <a class='text-primary stretched-link mt-4' data-id='$row[id]'>See details</a>
            </div>
          </div>
        </div>
      ";
    }
  }
  ?>
  </div>
</div>


<?php require 'components/footer.php'; ?>
