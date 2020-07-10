<?php

require '../lib/db.php';

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
  exit();
}

$db->alterData("DELETE FROM managers WHERE id = ?", [$_POST['id']]);

echo json_encode('Delete successfully');

