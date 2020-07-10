<?php

if (unlink($_POST['fileName'])) {
  echo json_encode('Delete successfully');
} else {
  echo json_encode('Failed to delete file.');
}