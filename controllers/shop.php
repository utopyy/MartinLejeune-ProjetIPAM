<?php
require 'models/articles.php';

$cats = getCats();
$titleCat = "Chercher une catégorie"; // quand aucune catégorie n'est sélectionnée

if (!empty($_GET['sub'])){
	$name = $_GET['sub'];
	$titleCat = $name;
}else{
	$name = "Proteines"; // si pas de catégorie définie, je décide qu'on affichera la catégorie Proteines
}
// creation d'un tableau reprenant toutes les infos d'une sous-catégorie
$data = array();
$title = getArticleTitle($name);
$price = getArticlePrice($name);
$path = getArticlePath($name);
$data = array();
for($cpt=0;$cpt<count($title);$cpt++){
$temptab = ['title' => $title[$cpt],
'price' => $price[$cpt],
'path' => $path[$cpt],];
array_push($data,$temptab);
}

include 'views/shop.php';
?>