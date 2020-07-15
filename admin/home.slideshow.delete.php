<?php 
include '../lib/db.php';

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
  exit();
}

$db->alterData("DELETE FROM home_slideshow WHERE id = ?;", [$_POST['id']]);

echo json_encode('Delete successfully.');