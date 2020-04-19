<?php
require_once('models/articles.php');

$articleName = str_replace("-", " ", ARTICLE_REF);
$articleTab = getFullArticle($articleName); // créé un tableau contenant un tableau avec les infos d'un article
$article = $articleTab[0]; //extraction du tableau
include 'views/article.php';
?>
