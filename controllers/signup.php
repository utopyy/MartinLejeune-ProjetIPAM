<?php
require_once 'models/users.php';

if(!empty($_POST)) {
    if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['birthdate']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
    {
        //vérification du pass et confirm_pass
        if($_POST['password'] != $_POST['confirm_password']){
            $errorMessage = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }
        else {          
            //vérifier que le login ou l'adresse mail n'existe pas
            $user = getUserByLogin($_POST['username']);
			$mail = getMailFromUser($_POST['mail']);
            if($user){
                $errorMessage = "Le login ".$_POST['username']." existe déjà...";
            }
            else if($mail){
				$errorMessage = "Le mail ".$_POST['mail']." existe déjà...";
			}else{
                createUser($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['mail'], $_POST['password'], $_POST['country'], $_POST['city'], $_POST['zip'], $_POST['street'], $_POST['house_number']);
			//ici je connecte directement l'user qui vient de s'inscrire
			$user = getUserByLogin($_POST['username']);
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] =  $user['username'];
			$_SESSION['userRole'] = $user['role_id'];
						echo $_SESSION['id'];
			header("Location: ".ROOT_PATH);
			exit();
			}
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $errorMessage = "Tu as oublié d'encoder quelque chose...";
    }
}
include 'views/signup.php';
?>