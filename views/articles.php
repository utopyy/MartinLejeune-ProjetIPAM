<?php
require '../models/articles.php';
$name = "Disques";
$title = getArticleTitle($name);
$price = getArticlePrice($name);
$desc = getArticleDesc($name);
$path = getArticlePath($name);
$data = array();
for($cpt=0;$cpt<count($title);$cpt++){
	$temptab = ['title' => $title[$cpt],
	'price' => $price[$cpt],
	'desc' => $desc[$cpt],
	'path' => $path[$cpt],];
	array_push($data,$temptab);
}
foreach($data as $row){
	echo($row['price']);
}














/*
require '../models/articles.php';
$data = getCats();
foreach($data as $row){
	echo $row . "(";
	echo getNbCats($row) . ")";
	echo "<br/>";
	$subCat = getSubCats($row);
	foreach($subCat as $roww){
		echo "- " . $roww . "(";
		echo getNbSubCats($roww) . ")";
		echo "<br/>";	
	}
}

$title="Les articles";
$content = ob_get_clean();
include 'includes/template.php';*/
?>