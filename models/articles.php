<?php
require_once '../models/db.php';

// Calculer le nombre d'articles dans une catégorie
function getNbCats($cat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND c.name LIKE :cat');
	$response->execute([':cat' => $cat]);
	$nbCat = $response->fetch();
	$response->closeCursor();
	return $nbCat[0];
}

// Calculer le nombre d'articles dans une sous catégorie
function getNbSubCats($subcat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$nbArticles = $response->fetch();
	$response->closeCursor();
	return $nbArticles[0];
}

// Charger les catégories de la BDD
function getCats(){
	$response = getBdd()->query('SELECT * FROM category');
	$catName = array();
	while ($donnees = $response->fetch()){	
		array_push($catName,$donnees['name']);
	}
	$response->closeCursor();
	return $catName;
}

// Charger les sous-catégories de la BBD
function getSubCats($cat){
	$response = getBdd()->prepare('SELECT s.name FROM sub_category AS s, category AS c WHERE s.id_category = c.id AND c.name LIKE :name');
	$response->execute([':name' => $cat]);
	$subName = array();
	while ($donnees = $response->fetch()){	
		array_push($subName,$donnees['name']);
	}
	$response->closeCursor();
	return $subName;
}

function getArticleTitle($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['title']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticlePrice($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['price']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticleDesc($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['description']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticlePath($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['photo_path']);
	}
	$response->closeCursor();
	return $subCat;
}
?>