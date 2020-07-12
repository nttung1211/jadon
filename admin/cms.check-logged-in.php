<?php 

if (!isset($_SESSION['jadon_loggedIn'])) {
  header('Location: cms.login.php');
  exit();
} else {
  $now = new DateTime(null, new DateTimeZone('Asia/Ho_Chi_Minh'));
  $db->alterData("UPDATE managers SET last_activity_time = ? WHERE id = ?;", [$now->format('Y-m-d H:i:s'), $_SESSION['jadon_loggedIn']['id']]);
}

