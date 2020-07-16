<?php require 'lib/db.php';
$currentPage = 'index.php' ?>
<?php
$rows = $db->getData("SELECT * FROM home_slideshow ORDER BY img_order;");
?>
<?php require 'components/header.php'; ?>
<link rel="stylesheet" href="css/index.css">
<title>Home</title>
<?php require 'components/navigation.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Start Bootstrap</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="our-work.php">Our work</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
      <?php
      if ($rows !== 0) {
        foreach ($rows as $i => $row) {
          $imgUrl = substr($row['img_url'], 1);
          $active = $i === 0 ? 'active' : '';
          echo "
            <li data-target='#carouselExampleIndicators' data-slide-to='$i' class='$active'></li>
          ";
        }
      }
      ?>
    </ol>
    <div class="carousel-inner" role="listbox">
      <?php
      if ($rows !== 0) {
        foreach ($rows as $i => $row) {
          $imgUrl = substr($row['img_url'], 1);
          $active = $i === 0 ? 'active' : '';
          echo "
            <div class='carousel-item $active' style='background-image: url($imgUrl)'>
              <div class='carousel-caption d-none d-md-block'>
                <h2 class='display-4'>$row[title]</h2>
                <p class='lead'>$row[caption]</p>
              </div>
            </div>
          ";
        }
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <h1 class="display-4">Full Page Image Slider</h1>
    <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images in this snippet are from <a href="https://unsplash.com">Unsplash</a>, taken by <a href="https://unsplash.com/@joannakosinska">Joanna Kosinska</a>!</p>
  </div>
</section>

<?php require 'components/footer.php'; ?>
