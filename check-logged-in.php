<?php 

if (!isset($_SESSION['user_loggedIn']) && isset($_COOKIE['user_loggedIn'])) {
  $_SESSION['user_loggedIn'] = unserialize($_COOKIE['user_loggedIn']);
} 

?>

