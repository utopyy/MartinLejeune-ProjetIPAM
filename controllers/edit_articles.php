<?php
require 'models/articles.php';
$articles = getAllArticles();

if(!empty($_GET['delete'])){
	deleteArticleById($_GET['delete']);
	header("Location: edit_articles");
	exit();
}else if(!empty($_GET['modify'])){
	echo "modif";
}
	

include 'views/edit_articles.php';
?>

