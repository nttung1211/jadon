<?php include '../lib/db.php'; ?>

<?php

if (!isset($_SESSION['jadon_loggedIn'])) {
  header('Location: login.php');
  exit();
}

?>

<?php include './components/header.php';
$currentPage = 'managers.php' ?>

<script src="js/managers.js" type="module" defer></script>
<link rel="stylesheet" href="css/managers.css">
<title>Managers</title>

<?php include './components/navigation.php'; ?>

<div class="container-fluid">
  <div class="row mt-4">

    <div class="col-sm-12 col-lg-9 mx-auto mt-2">
      <a href="add-manager.php" class="btn btn-success mb-4">Add an account</a>
      <ul id="manager-container" class="list-group"></ul>
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
          Are you sure you want to delete this account?
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