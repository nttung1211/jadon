<?php include 'db.class.php' ?>
<?php

session_start();

$db = new DB(
  'localhost',
  'root',
  '',
  'jadon_db'
);

function msg( $sessionItem) {
  if (isset($_SESSION[$sessionItem])) {
    $alrertType = $sessionItem === 'error' ? 'danger' : 'success';
    echo "
      <div class='alert alert-$alrertType alert-dismissible fade show' role='alert'>
        <strong>$_SESSION[$sessionItem][email]</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
    ";

    unset($_SESSION[$sessionItem]);
  }
}

function uploadFiles($files, $savePath, $readPath, $table) {
  global $db;
  $query = "
    INSERT INTO 
      $table
    SET 
      img_url = ?;
  ";

  foreach ($files['tmp_name'] as $i => $tmp_name) {
    // PREPARE FILE TO WRITE
    $index = strrpos($files['name'][$i], '.');
    $fileExtension = strtolower(substr($files['name'][$i], $index + 1));
    $filePureName = substr($files['name'][$i], 0, $index);
    $uniqueId = uniqid();
    $saveDestination = $savePath . $filePureName . '.' . $uniqueId . '.' . $fileExtension;
    $readDestination = $readPath . $filePureName . '.' . $uniqueId . '.' . $fileExtension;

    // WRITE FILE TO FOLDER
    if (!move_uploaded_file($tmp_name, $saveDestination)) {
      return -1;
    };

    // WRITE FILE ULR TO DATABASE
    $db->alterData($query, [$readDestination]);
  }

  return 1;
}




