<?php
require_once 'models/articles.php';

if($_SESSION['userRole']!=2){
	header('Location: welcome');
	exit();
}

if(!empty($_POST)) {
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['categorieSel'])){
		$title = strtoupper(str_replace("-", " ", $_POST['title']));
		// On vérifie si l'article n'existe pas déjà, pour les stats on va empecher de créer un article ayant le meme nom qu'un article supprimé)
		if(exists($title)){
			$errorMessage = "Un article portant ce nom existe déjà ou a été supprimé, veuillez changer de nom";
		}else{			
			$typefichier = $_FILES ['image'] ['type'];
			$types_fichiers_autorises = array ('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
			if(in_array($typefichier, $types_fichiers_autorises)){
				$img = $_FILES['image']['name'];
				$newName = rand(1,1000); // creation d'un nombre aleatoire
				$newName = $newName.time(); // ajout de .time() pour le rendre unique
				$newName = $newName.".jpg"; // ajout de l'extension jpg 
				move_uploaded_file($_FILES['image']['tmp_name'], "public/img/upload/".$newName);
				createArticle($title, $_POST['description'], $_POST['price'], $_POST['subcatSel'], "public/img/upload/".$newName);	
				header("Location: ".ROOT_PATH."edit/all/articles");
				exit();
			}else{
				$errorMessage = "Le fichier n'a pas été uploadé ou n'est pas un format d'image valide";
			}
		}
	}else{
    //Ici on va prévenir l'utilisateur qu'il manque quelque chose
    $errorMessage = "Tu as oublié d'encoder quelque chose...";
	}	
}
include 'views/add_article.php';
?>
