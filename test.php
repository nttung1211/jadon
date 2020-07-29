<?php 
require 'lib/db.php';
$row = $db->getData("SELECT * FROM home_introduction where id = 5;")[0];
if ($row['img_url'] === null) {
  echo 'tung';
}