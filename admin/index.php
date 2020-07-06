<?php include '../lib/db.php'; ?>

<?php  

if (!isset($_SESSION['jadon_loggedIn'])) {
  header('Location: login.php');
  exit();
}

?>

<?php include './components/header.php'; ?>
  <script src="js/index.js" type="module" defer></script>
  <title>Home</title>
</head>

<body>
<?php include './components/navigation.php'; ?>

    <div class="container">
      <h2 class="mt-4 text-dark">Slide show images</h2>
      <div class="row">
        <div class="col-sm-12 mt-4">
          <form enctype="multipart/form-data">
            <div class="form-group">
              <div class="file-upload">
                <label for="upload" class="file-upload__label">Upload image</label>
                <input id="upload" class="file-upload__input" type="file" multiple>
              </div>
            </div>
          </form>
        </div>   
      </div>

      <div class="row px-3 image-container">

      </div>
    </div>
    
    <hr class="mx-5">

    
  </div>


<?php include './components/footer.php'; ?>
