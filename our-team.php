<?php require 'lib/db.php';
$currentPage = 'our-team.php' ?>
<?php require 'components/header.php'; ?>
<link rel="stylesheet" href="css/our-team.css">
<title>Our Team</title>
<?php require 'components/navigation.php'; ?>

<div class="container outmost-container">
  <div class="row">
  <?php 

  $rows = $db->getData("SELECT * FROM team_members;");

  if ($rows !== 0) {
    foreach ($rows as $row) {
      $imgUrl = substr($row['img_url'], 1);
      if (strlen($row['description']) > 130) {
        $description = substr($row['description'], 0, 128);
        $more = substr($row['description'], 128);
        $showMoreBtn = "<a class='text-primary stretched-link mt-3 d-block show-more'><span>Show more</span><i class='fas fa-chevron-down ml-2'></i></a>";
        $dots = '...';
      } else {
        $description = $row['description'];
        $more = '';
        $showMoreBtn = "<div class='show-more-place-holder'></div>";
        $dots = '';
      }

      echo "
        <div class='col-sm-8 col-md-6 col-xl-4 mx-auto mb-4'>
          <div class='card border-0 shadow-sm'>
            <img src='$imgUrl' class='card-img-top' alt='image'>
            <div class='card-body text-center'>
              <h2 class='card-title mb-3 text-capitalize'>$row[fullname]</h2>
              <h4 class='card-text text-black-50 mb-3'>$row[role]</h4>
              <div class='card-text text-black-50 text-left long-content'>$description<span class='dots'>$dots</span><span class='more'>$more</span></div>
              $showMoreBtn
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
