<?php
require_once '../models/users.php';

if(!empty($_POST)) {
    if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['birthdate']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
    {
        //vérification du pass et confirm_pass
        if($_POST['password'] != $_POST['confirm_password']){
            $errorMessage = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }
        else {          
            //vérifier que le login n'existe pas
            $user = getUserByLogin($_POST['username']);
            if($user){
                $errorMessage = "Le login ".$_POST['username']." existe déjà...";
            }
            else {
                createUser($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['birthade'], $_POST['mail'], $_POST['password']);
            }
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $errorMessage = "Tu as oublié d'encoder quelque chose...";
    }
}else{
	 $errorMessage = "Problème avec POST?";
}
include '../views/signup.php';
?>