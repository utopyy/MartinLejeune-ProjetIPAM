<?php
require 'models/articles.php';
if($_SESSION['id']!=2){
	header('Location: welcome');
	exit();
}
$articles = getAllArticles();

if(!empty($_GET['delete'])){
	deleteArticleById($_GET['delete']);
	header("Location: edit_articles");
	exit();
}
include 'views/edit_articles.php';
?>

