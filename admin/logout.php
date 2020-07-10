<?php include '../lib/db.php'; ?>
<?php 

if (isset($_SESSION['jadon_loggedIn'])) {
  unset($_SESSION['jadon_loggedIn']);
}

header('Location: index.php');
exit();