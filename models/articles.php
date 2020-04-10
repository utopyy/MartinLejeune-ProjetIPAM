<?php
require_once '../models/db.php';

// Calculer le nombre d'articles dans une catégorie
function getNbCats($cat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND c.name LIKE :cat');
	$response->execute([':cat' => $cat]);
	$nbCat = $response->fetch();
	$response->closeCursor();
	return $nbCat;
}

// Calculer le nombre d'articles dans une sous catégorie
function getNbArticlesBySubCat($subcat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c WHERE s.id_category = c.id AND c.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$nbArticles = $response->fecth();
	$response->closeCursor();
	return $nbArticles;
}
	
// Charger les catégories de la BDD
function getCats(){
	$response = getBdd()->('SELECT `name` FROM category');
	$response->execute();
	$cats = $response->fecth();
	$response->closeCursor();
	return $cat;
}

// Charger les sous-catégories de la BBD
function getSubCats($cat){
	$response = getBdd()->('SELECT s.name FROM sub_category AS s, category AS c WHERE s.id_category = c.id AND c.name LIKE :cat');
	$response->execute([':cat' => $cat]);
	$subcats = $response->fecth();
	$response->closeCursor();
	return $subcats;
}

?>