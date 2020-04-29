<?php
require_once 'models/articles.php';
if($_SESSION['userRole']!=2){
	header('Location: welcome');
	exit();
}
$photo_path = "public/img/logo.png"; //je mets une photo par défaut aux articles

if(!empty($_POST)) {
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['subcatSel'])){
		$title = str_replace("-", " ", $_POST['title']);
		createArticle($title, $_POST['description'], $_POST['price'], $_POST['subcatSel'], $photo_path);	
		header("Location: ".ROOT_PATH."edit/all/articles");
		exit();
	}else{
    //Ici on va prévenir l'utilisateur qu'il manque quelque chose
    $errorMessage = "Tu as oublié d'encoder quelque chose...";
	}	
}
include 'views/add_article.php';
?>
