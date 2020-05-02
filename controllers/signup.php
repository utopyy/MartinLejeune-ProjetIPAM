<?php
require_once 'models/users.php';

if(!empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['birthdate']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
    {
        //vérification du pass et confirm_pass
        if($_POST['password'] != $_POST['confirm_password']){
            $errorMessage = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }
        else {  
			if(strlen($_POST['username'])>12){
				$errorMessage = "Votre nom d'utilisateur ne peut pas faire plus de 12 catactères"
			}
            //vérifier que le login ou l'adresse mail n'existe pas
            $user = getUserByLogin(clearText($_POST['username']));
			$mail = getMailFromUser($_POST['mail']);
            if($user){
                $errorMessage = "Le login ".$_POST['username']." existe déjà...";
            }
            else if($mail){
				$errorMessage = "Le mail ".$_POST['mail']." existe déjà...";
			}else{
                createUser(clearText($_POST['username']), trim($_POST['firstname']), trim($_POST['lastname']), $_POST['birthdate'], 
				trim($_POST['mail']), $_POST['password'], trim($_POST['country']), trim($_POST['city']), trim($_POST['zip']), trim($_POST['street']), trim($_POST['house_number']));
			//ici je connecte directement l'user qui vient de s'inscrire
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] =  $user['username'];
			$_SESSION['userRole'] = $user['role_id'];
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

function clearText($str){
$str = trim($str);
$old_chars = array('Š', 'š', 'Ž', 'ž', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù',
					'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ',
					'ö', 'ø', 'ù', 'ú', 'û', 'ý', 'ÿ');
$new_chars = array('S', 's', 'Z', 'z', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U',
					'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o',
					'o', 'o', 'u', 'u', 'u', 'y', 'y');
$safe_str = strtr($str, array_combine($old_chars, $new_chars));
return $safe_str;
}
?>