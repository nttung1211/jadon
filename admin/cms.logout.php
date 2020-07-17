<?php include '../lib/db.php'; ?>
<?php 
session_destroy();
setcookie('jadon_loggedIn', '', time() - 86400, '/');
header('Location: index.php');
exit();