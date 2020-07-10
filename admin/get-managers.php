<?php

require '../lib/db.php';

$rows = $db->getData("SELECT * FROM managers;");

if ($rows === 0) {
  echo json_encode('');
} else {
  echo json_encode($rows);
}
