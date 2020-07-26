<?php 
include '../lib/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $db->alterData("DELETE FROM $_POST[table] WHERE id = ?;", [$_POST['id']]);
  echo json_encode('Delete successfully.');
}

exit();