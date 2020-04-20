<?php
require_once('models/articles.php');
require_once('models/panier.php');

if(isset($_GET['title'])){
	$article = getFullArticle($_GET['title'])[0];
	ajouterArticle($article['title'],"1", $article['price'], $article['photo_path']);
}
if(isset($_SESSION['panier'])){
	$nbArticles=count($_SESSION['panier']['nameId']);
	$montantTotal = montantTotal();
}else{
	$nbArticles=0;
}

if(isset($_GET['delete'])){
	if($_GET['delete']=="all"){
		supprimerPanier();
	}else{
		supprimerArticle($_GET['nameArt']);
	}
	header('Location: panier');
	exit();
}
include 'views/panier.php';
?>
		