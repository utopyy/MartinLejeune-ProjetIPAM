<?php
require 'models/articles.php';

$cats = getCats(); //donne les 3 catégories
$input = "array("; // a concaténer avec le reste
$verifCat = 0;
$verifSub = 0;

foreach($cats as $cat){
	$tailleCat = getNbCats($cat); // on récupère la taille de la catégorie
	$subcats = getSubCats($cat) //on récupère les sous catégories d'une catégorie
	if($verifCat!= 0){ //si on met des virgules à chaque itération, on en aura une en trop à la fin, je la mets donc au début sauf sur le premier elem
		$nextElem = ", ";
	}
	$input .= $nextElem . $cat . "=>array(" . $tailleCat . ", array(";
	$verifCat++; // on incrémente la verif pour activer les virugles
	foreach($subcats as $subcat){
		if($verifSub != 0){ //si on met des virgules à chaque itération, on en aura une en trop à la fin, je la mets donc au début sauf sur le premier elem
			$nextElemSub=", ";
		}
		$subcatsize = getNbSubcat($subcat); // on récupère la taille de la ""
		$input .= $nextElemSub . $subcat . "=>array(" . $subcatsize . ")"
		$verifSub++; //// on incrémente la verif pour activer les virugles
	}
}
$input .= ");";
include 'views/articles.php';
?>
	
	
	


















	
	
	
	
	
	
	
	
	
