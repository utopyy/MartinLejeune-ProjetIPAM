<?php
require_once 'models/users.php';

if(!$_SESSION['id']){
	header('Location: welcome');
	exit();
}
if(!empty($_GET['admin']) && $_SESSION['userRole']==2){
	$username = $_GET['admin'];
	$user = getFullUser(getUserId($username));
}else{
	$username = $_SESSION['username'];
	$user = getFullUser($_SESSION['id']);
}

$error = false;
if(!empty($_POST)) {
    if(!empty($_POST['mail']) && !empty($_POST['street']) && !empty($_POST['nohouse']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['country']))
    {
		//si l'user est connecté il ne peut pas modifier son role et role_radio n'est donc pas initialisé
		if(empty($_POST['role_radio'])){
			$role = $user['role_id'];
		}else{
			$role = $_POST['role_radio'];
		}
        //vérification si il y a changement de mot de passe ou pas
        if((!empty($_POST['password']) && empty($_POST['confirm_pswd'])) || (empty($_POST['password']) && !empty($_POST['confirm_pswd']))){
				$errorMessage = "Le mot de passe ou sa confirmation est invalide";
				$error = true;
		}else if(!empty($_POST['password']) && !empty($_POST['confirm_pswd'])){
			if($_POST['password'] != $_POST['confirm_pswd']){
				$errorMessage = "Votre nouveau mot de passe et votre mot de passe de confirmation ne correspondent pas...";
				$error = true;
			}else{
				updatePassword($username, $_POST['password']);
			}
		}
		// on vérifie que l'user ne rentre pas un nouveau mail qui existe déjà (son mail actuel ne doit pas être vérifié)
		$mail = getMailFromUser($_POST['mail']);
		if($mail && $mail['username'] != $username){
				$errorMessage = "Le mail ".$_POST['mail']." existe déjà...";
		// on vérifie le cas où un admin est sur la page de son profil et essaie de modifier son propre role (on l'en empêche : comme ça on s'assure qu'il y ait tjr un compte admin sur le site)
		}else if($_SESSION['username'] == $user['username'] && $user['role_id']!=$role){
			$errorMessage = "Vous ne pouvez pas modifier votre propre role";
		}else if(!$error){
			updateUser($_POST['mail'], $_POST['country'], $_POST['city'], $_POST['zip'], $_POST['street'], $_POST['nohouse'], $role, $username);			
			header("Location: profil?admin=".$user['username']);
			exit();
		}    
	}else{
		//Ici on va prévenir l'utilisateur qu'il manque quelque chose
		$errorMessage = "Tu as oublié d'encoder quelque chose...";
	}
}
include 'views/profil.php';
?>
