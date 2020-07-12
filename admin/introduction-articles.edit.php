<?php
require '../lib/db.php';

$_SESSION['jadon_introduction'] = true;
header('Location: index.php');
exit();