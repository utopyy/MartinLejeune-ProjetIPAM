<?php
require 'models/users.php';
$users = getAllUsers();

// On transforme l'id_role de l'user pour qu'il soit plus explicite
// Je ne dois pas vérifier qu'un role_id, c'est un champ not nul en db et une personne au moins doit être enregistrée pour avoir accès au menu edit_users
foreach($users as &$user){
	if($user['role_id']==2){
		$user['role_id']="Administrateur";
	}else{
		$user['role_id']="Utilisateur";
	}
}
unset($user); // destruction de la référence

	
// On vérifie si l'user n'essaie pas de se supprimer lui même
if(!empty($_GET['delete'])){
	if($_SESSION['username']!= $_GET['delete']){
		deleteUser($_GET['delete']);
	}else{
		$errorMessage = "Vous ne pouvez pas supprimer votre propre compte";
	}
}
include 'views/edit_users.php';
?>

