<?php 
include '../lib/db.php';

if (!$_SERVER["REQUEST_METHOD"] === "POST") {
  exit();
}

$result = uploadFiles(
  $_FILES['upload'], 
  '../img/home-slideshow/', 
  '../img/home-slideshow/', 
  'home_slideshow_photos'
);

echo json_encode('Upload to server successfully.');




