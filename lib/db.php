<?php include 'db.class.php' ?>
<?php

session_start();

$db = new DB(
  'localhost',
  'root',
  '',
  'jadon_db'
);

/* FUNCTIONS */

function uploadFiles($files, $savePath, $readPath, $table) {
  global $db;
  $query = "
    INSERT INTO 
      $table
    SET 
      img_url = ?;
  ";
  //+ is_uploaded_file();

  foreach ($files['tmp_name'] as $i => $tmp_name) {
    // PREPARE FILE TO WRITE
    ['saveUrl' => $saveUrl, 'readUrl' => $readUrl] = prepareFileUrl($files['name'][$i], $savePath, $readPath);

    // WRITE FILE TO FOLDER
    if (!move_uploaded_file($tmp_name, $saveUrl)) {
      exit('Failed to write file to server');
    };

    // WRITE FILE ULR TO DATABASE
    $db->alterData($query, [$readUrl]);
  }

  return 1;
}

function prepareFileUrl($fileName, $savePath, $readPath) {

    $index = strrpos($fileName, '.');
    $fileExtension = strtolower(substr($fileName, $index + 1));
    $filePureName = substr($fileName, 0, $index);
    $uniqueId = uniqid();
    $saveUrl = $savePath . $filePureName . '.' . $uniqueId . '.' . $fileExtension;
    $readUrl = $readPath . $filePureName . '.' . $uniqueId . '.' . $fileExtension;
  
  return ['saveUrl' => $saveUrl, 'readUrl' => $readUrl];
}


