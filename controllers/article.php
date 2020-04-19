<?php
require_once('models/articles.php');

if(empty($_POST)){
$articleName = str_replace("-", " ", ARTICLE_REF); 
$articleTab = getFullArticle($articleName); // créé un tableau contenant un tableau avec les infos d'un article
$article = $articleTab[0]; //extraction du tableau
}else{
	if(empty($_POST['title'])){
		$title = $_GET['name'];
	}else{
		$title = $_POST['title'];
	}
	if(empty($_POST['price'])){
		$price = $_GET['price'];
	}else{
		$price = $_POST['price'];
	}
	if(empty($_POST['description'])){
		$description = $_GET['description'];
	}else{
		$description = $_POST['description'];
	}
	updateArticle($_GET['name'], $title, $price, $description);
	header("Location: edit_articles");
	exit();

}
include 'views/article.php';
?>
