<?php include '../lib/db.php'; $currentPage = 'home.introduction.php';?>
<?php include 'cms.check-logged-in.php'; ?>

<?php include './components/header.php'; ?>

<script src="js/index.js" type="module" defer></script>
<link rel="stylesheet" href="css/index.css">
<title>Home</title>

<?php include './components/navigation.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 mt-4">

      <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-row text-center">
        <li class="nav-item flex-fill">
          <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="<?php echo isset($_SESSION['jadon_introduction']) ? 'false' : 'true'; unset($_SESSION['jadon_introduction']); ?>" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">Slideshow Images</a>
        </li>
        <li class="nav-item flex-fill">
          <a id="introduction-tab" data-toggle="tab" href="#introduction" role="tab" aria-controls="introduction" aria-selected="<?php echo isset($_SESSION['jadon_introduction']) ? 'true' : 'false'; unset($_SESSION['jadon_introduction']); ?>" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">Introduction articles</a>
        </li>
      </ul>

      <div id="myTab2Content" class="tab-content">
        <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
          <form enctype="multipart/form-data">
            <div class="form-group">
              <div class="row">
                <div class="col-xl-3 col-md-4 col-5 mx-auto m-3">
                  <label for="upload" class="file-upload btn btn-primary btn-block border-0 py-2 shadow-sm">
                    <i class="fa fa-upload mr-2"></i>Upload
                    <input id="upload" type="file" multiple>
                  </label>
                </div>
              </div>
            </div>
          </form>

          <div class="row" id="image-container"></div>

        </div>

        <div id="introduction" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
          <a href="introduction-articles.edit.php" class="btn btn-primary">Edit</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Confirm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include './components/footer.php'; ?>