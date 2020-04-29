<?php
require_once 'models/articles.php';
require_once 'public/js/martin.js';

if($_SESSION['userRole']!=2){
	header('Location: welcome');
	exit();
}

if(!empty($_POST)) {
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['subcatSel'])){
		$title = strtoupper(str_replace("-", " ", $_POST['title']));
		// On vérifie si l'article n'existe pas déjà, pour les stats on va empecher de créer un article ayant le meme nom qu'un article supprimé)
		if(exists($title)){
			$errorMessage = "Un article portant ce nom existe déjà ou a été supprimé, veuillez changer de nom";
		}else{
			$img = $_FILES['image']['name'];
			// On appelle fonction js pour s'assurer que le fichier upload est bien une image
			if(check_image_mime($img)){
			move_uploaded_file($_FILES['image']['tmp_name'], "public/img/upload/coucou.jpg");
			createArticle($title, $_POST['description'], $_POST['price'], $_POST['subcatSel'], "public/img/upload/coucou.jpg");	
			header("Location: ".ROOT_PATH."edit/all/articles");
			exit();
			}else{
				$errorMessage = "Le fichier n'est pas une image";
			}
		}
	}else{
    //Ici on va prévenir l'utilisateur qu'il manque quelque chose
    $errorMessage = "Tu as oublié d'encoder quelque chose...";
	}	
}
include 'views/add_article.php';
?>
