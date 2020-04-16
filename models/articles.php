<?php
require_once 'models/db.php';

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

function getAllArticles(){
	$response = getBdd()->prepare('SELECT a.id, a.title, a.description, a.price, c.name as catname, s.name as subname FROM article AS a, category AS c, sub_category AS s WHERE s.id_category = c.id AND s.id = a.category_id');
	$response->execute();
	$articles = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $articles;
}

function deleteArticleById($id){
	//on supprime d'abord l'adresse (autre table)
	$response = getBdd()->prepare('DELETE FROM article WHERE id = :id');
	$array = array('id' => $id);
	$response->execute($array);
	$response->closeCursor();
}	

function createArticle($title, $description, $price, $category_id, $photo_path){
		$response = getBdd()->prepare('INSERT INTO article(title, description, price, category_id, photo_path) VALUES (:title, :description, :price, :category_id, :photo_path)');
	$response->execute([':title' => $title, ':description' => $description, ':price' => $price, ':category_id' => $category_id, ':photo_path' => $photo_path]);
	$response->closeCursor();
}	

?>