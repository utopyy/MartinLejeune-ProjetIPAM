<?php
require_once 'models/db.php';

// On créé une commande
function createBook($userId){
	$response = getBdd()->prepare('INSERT INTO book(user_id) VALUES (:userId)');
	$response->execute([':userId' => $userId]);
	$response->closeCursor();
}

//On doit récupérer l'id de la commande en cours
function getBookId($userId){
	$response = getBdd()->prepare('SELECT MAX(id) FROM book where user_id = :userId');
	$response->execute([':userId' => $userId]);
	$id = $response->fetch();
	$response->closeCursor();
	return $id[0];
}

// Fonction principale
function bookArticle($userId, $item_id, $price){
	$book_id = getBookId($userId);
	$response = getBdd()->prepare('INSERT INTO book_article(book_id,item_id,price) VALUES (:book_id, :item_id, :price)');
	$response->execute([':book_id' => $book_id, ':item_id' => $item_id, ':price' => $price]);
	$response->closeCursor();
}

// Nombre de commandes de l'utilisateur
function nbBooksByUser($userId){
	$response = getBdd()->prepare('SELECT COUNT(*) as nbCom FROM book WHERE user_id = :user_id');
	$response->execute([':user_id' => $userId]);
	$nb = $response->fetch();
	$response->closeCursor(); 
	return $nb;
}

// Toutes les commandes de l'utilisateur
function booksByUser($userId){
	$response = getBdd()->prepare('SELECT b.id AS noCom,CAST(SUM(ba.price) AS DECIMAL(10,2)) AS priceTot, COUNT(ba.id) AS nbArticle FROM book AS b, book_article AS ba WHERE b.id = ba.book_id AND b.user_id = :user_id GROUP BY(b.id)');
	$response->execute([':user_id' => $userId]);
	$books = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $books;
}

// Une commande précise de l'utilisateur
function getBook($bookId){
	$response = getBdd()->prepare('SELECT a.title, a.photo_path AS `path`, COUNT(ba.item_id) AS qtProduit, ba.price, CAST(SUM(ba.price) AS DECIMAL(10,2)) AS total FROM article AS a, book_article AS ba, book AS b WHERE b.id = ba.book_id AND b.id = :bookId AND ba.item_id = a.id GROUP BY a.id');
	$response->execute([':bookId' => $bookId]);
	$book = $response->fetchAll(PDO::FETCH_ASSOC);
	$response->closeCursor();
	return $book;
}

function getPriceBook($bookId){	
	$response = getBdd()->prepare('SELECT CAST(SUM(ba.price) AS DECIMAL(10,2)) AS total FROM book_article AS ba, book AS b WHERE b.id = ba.book_id AND b.id = :bookId');
	$response->execute([':bookId' => $bookId]);
	$price = $response->fetch();
	$response->closeCursor();
	return $price;
}
?>	
	