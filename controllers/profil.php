<?php
require_once 'models/users.php';

$user = getFullUser($_SESSION['id']);
include 'views/profil.php';
?>
