<?php
include 'lib/db.php';

$rows = $db->getData("SELECT * FROM home_slideshow;");

if ($rows) {
  echo json_encode($rows);
} else {
  echo json_encode('');
}
