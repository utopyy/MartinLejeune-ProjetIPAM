<?php
require_once('models/articles.php');

//Si un user tente d'écrire monprojet.test/article: probleme (car aucun article passé dans l'url)
if(empty(ARTICLE_REF) && empty($_GET['name'])){
	header('Location: shop');
	exit();
}

// Si il n'y a pas de modification (qu'on veut juste afficher la page détail d'un article)
if(empty($_POST)){ 
$articleName = str_replace("-", " ", ARTICLE_REF);
$articleTab = getFullArticle($articleName); // créé un tableau contenant un tableau avec les infos d'un article
$article = $articleTab[0]; //extraction du tableau 
include 'views/article.php';
// Si dans la page article on veut modifier un article (traitement puis on refresh la page)
}else{
	$title = $_POST['title'];
	$articleTab = getFullArticle($title);
	$photo_path = $articleTab[0]['photo_path'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$subcat = $_POST['subcatSel'];
	$typefichier = $_FILES ['image'] ['type'];
	$types_fichiers_autorises = array ('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
	if(in_array($typefichier, $types_fichiers_autorises)){
		unlink($photo_path); // suppression de l'ancienne image
		$img = $_FILES['image']['name']; // on récupère le nom de l'image
		$newName = rand(1,1000); // creation d'un nombre aleatoire
		$newName = $newName.time(); // ajout de .time() pour le rendre unique
		$newName = $newName.".jpg"; // ajout de l'extension jpg 
		$photo_path = "public/img/upload/".$newName;
		move_uploaded_file($_FILES['image']['tmp_name'], $photo_path);
	}
	updateArticle($_GET['name'], $title, $price, $description, $subcat, $photo_path);
	header('Location: article/'.strtolower(str_replace(" ", "-",($_POST['subcatSel']))).'/'.strtolower(str_replace(" ", "-", $title)));
	exit();
}
?>
