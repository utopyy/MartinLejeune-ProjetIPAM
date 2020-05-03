<?php
require_once 'models/articles.php';

$articles = getAllArticles();

if(!empty($_GET['delete'])){
	deleteArticleById($_GET['delete']);
	header("Location: ".ROOT_PATH."edit/all/articles");
	exit();
}
include 'views/edit_articles.php';
?>

