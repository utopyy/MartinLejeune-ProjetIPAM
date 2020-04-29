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
		$price = $_POST['price'];
		$description = $_POST['description'];
		$subcat = $_POST['subcatSel'];
		
	updateArticle($_GET['name'], $title, $price, $description, $subcat);
	header('Location: article/'.strtolower(str_replace(" ", "-",($_POST['subcatSel']))).'/'.strtolower(str_replace(" ", "-", $title)));
	exit();
}
?>
