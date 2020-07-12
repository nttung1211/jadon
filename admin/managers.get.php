<?php

require '../lib/db.php';

$rows = $db->getData("SELECT * FROM managers;");
$currentManagerLevel = $_SESSION['jadon_loggedIn']['level'];

if ($rows === 0) {
  echo json_encode('');
} else {
  echo json_encode(['managers' => $rows, 'currentManagerLevel' => $currentManagerLevel]);
}
