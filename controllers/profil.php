<?php
require_once 'models/users.php';
$user = getFullUser($_SESSION['id']);


// PARTIE POUR  L'ADMIN QUI GERE LES PROFILS (a paufiner)
//faire différence entre édit le profil de soi meme (comme admin) ou edit le profil d'un membre !! pour l'instant j'utilise $_SESSION
$error = false;
if(!empty($_POST)) {
    if(!empty($_POST['mail']) && !empty($_POST['street']) && !empty($_POST['nohouse']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['country']))
    {
        //vérification si il y a changement de mot de passe ou pas
        if((!empty($_POST['password']) && empty($_POST['confirm_pswd'])) || (empty($_POST['password']) && !empty($_POST['confirm_pswd']))){
				$errorMessage = "Le mot de passe ou sa confirmation est invalide";
				$error = true;
		}else if(!empty($_POST['password']) && !empty($_POST['confirm_pswd'])){
			if($_POST['password'] != $_POST['confirm_pswd']){
				$errorMessage = "Votre nouveau mot de passe et votre mot de passe de confirmation ne correspondent pas...";
				$error = true;
			}else{
				updatePassword($_SESSION['username'], $_POST['password']);
			}
		}
		// on vérifie que l'user ne rentre pas un nouveau mail qui existe déjà (son mail actuel ne doit pas être vérifié)
		$mail = getMailFromUser($_POST['mail']);
		if($mail && $mail['username'] != $_SESSION['username']){
				$errorMessage = "Le mail ".$_POST['mail']." existe déjà...";
		}else if(!$error){
			updateUser($_POST['mail'], $_POST['country'], $_POST['city'], $_POST['zip'], $_POST['street'], $_POST['nohouse'], $_SESSION['username']);			
			header("Location: profil");
			exit();
		}    
	}else{
		//Ici on va prévenir l'utilisateur qu'il manque quelque chose
		$errorMessage = "Tu as oublié d'encoder quelque chose...";
	}
}
include 'views/profil.php';
?>
