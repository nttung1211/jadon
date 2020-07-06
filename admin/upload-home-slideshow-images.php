<?php 
include '../lib/db.php';

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
  exit();
}

$result = uploadFiles(
  $_FILES['upload'], 
  '../img/home-slideshow/', 
  '../img/home-slideshow/', 
  'home_slideshow_photos'
);


if ($result === 1) {
  echo json_encode('Upload to server successfully.');
} elseif ($result === -1) {
  echo json_encode('Failed to write file to folder');
} else {
  echo json_encode('An unkown error occured');
};



