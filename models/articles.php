<?php
require_once 'models/db.php';

// Calculer le nombre d'articles dans une catégorie
function getNbCats($cat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND c.name LIKE :cat AND a.delete != 1');
	$response->execute([':cat' => $cat]);
	$nbCat = $response->fetch();
	$response->closeCursor();
	return $nbCat[0];
}

// Calculer le nombre d'articles dans une sous catégorie
function getNbSubCats($subcat){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat AND a.delete != 1');
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
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat  AND `delete` != 1');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['title']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticlePrice($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat  AND `delete` != 1');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['price']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticleDesc($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat  AND `delete` != 1');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['description']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticlePath($subcat){
	$response = getBdd()->prepare('SELECT a.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat  AND `delete` != 1');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['photo_path']);
	}
	$response->closeCursor();
	return $subCat;
}

function getArticleCategory($subcat){
	$response = getBdd()->prepare('SELECT s.* FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND s.name LIKE :subcat');
	$response->execute([':subcat' => $subcat]);
	$subCat = array();
	while ($donnees = $response->fetch()){	
		array_push($subCat,$donnees['name']);
	}
	$response->closeCursor();
	return $subCat;
}

function getFullArticle($name){
	$response = getBdd()->prepare('SELECT a.id, a.title, a.description, a.price, a.photo_path, s.name as subName, c.name as catName FROM sub_category AS s, category AS c, article AS a WHERE s.id_category = c.id AND a.category_id = s.id AND a.title LIKE :name AND `delete` != 1');
	$response->execute([':name' => $name]);
	$article = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $article;
}

function getAllArticles(){
	$response = getBdd()->prepare('SELECT a.id, a.title, a.photo_path, a.description, a.price, c.name as catname, s.name as subname FROM article AS a, category AS c, sub_category AS s WHERE s.id_category = c.id AND s.id = a.category_id AND `delete` != 1');
	$response->execute();
	$articles = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $articles;
}

function updateArticle($oldtitle, $title, $price, $description, $subcat, $photo_path) {
    $reponse = getBdd()->prepare('UPDATE article SET title = :title, price = :price, `description` = :description, photo_path = :photo_path, category_id = (SELECT id FROM sub_category WHERE `name` LIKE :subcat) WHERE title = :oldtitle AND `delete` != 1');
    $reponse->execute([':title' => $title, ':price' => $price, ':description' => $description, ':photo_path' => $photo_path, ':oldtitle' => $oldtitle, ':subcat' => $subcat]);
    $reponse->closeCursor();
}


function deleteArticleById($id){
	$response = getBdd()->prepare('UPDATE article SET `delete` = 1 WHERE id = :id');
	$response->execute([':id' => $id]);
	$response->closeCursor();
}	

function createArticle($title, $description, $price, $category, $photo_path){
		$response = getBdd()->prepare('INSERT INTO article(title, description, price, category_id, photo_path) VALUES (:title, :description, :price, (SELECT id FROM sub_category WHERE `name` LIKE :category), :photo_path)');
	$response->execute([':title' => $title, ':description' => $description, ':price' => $price, ':category' => $category, ':photo_path' => $photo_path]);
	$response->closeCursor();
}

// Je fais le choix d'afficher aussi les articles qui ont été supprimé, l'idée ici est de garder un historique de ses (meilleures) ventes, je ne vois donc pas d'intéret à les retirer
function getBestSellers(){
	$response = getBdd()->prepare('SELECT a.title AS title, COUNT(ba.item_id) AS amount FROM article AS a, book_article AS ba WHERE a.id = ba.item_id GROUP BY ba.item_id ORDER BY amount DESC LIMIT 2');
	$response->execute();
	$result = $response->fetchAll(PDO::FETCH_KEY_PAIR|PDO::FETCH_GROUP);
	$response->closeCursor();
	return $result;
}

function exists($title){
	$response = getBdd()->prepare('SELECT COUNT(*) FROM article WHERE title LIKE :title');
	$response->execute([':title' => $title]);
	$result = $response->fetch();
	$response->closeCursor();
	return $result[0];
}

	

?>