<?php
require 'models/users.php';
$users = getAllUsers();
if(!empty($_GET['delete'])){
	if($_SESSION['username']!= $_GET['delete']){
		deleteUser($_GET['delete']);
	}else{
		$errorMessage = "Vous ne pouvez pas supprimer votre propre compte";
	}
}
include 'views/edit_users.php';
?>

