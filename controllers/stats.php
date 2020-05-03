<?php
require_once ('models/articles.php');
require_once ('models/book.php');
require_once ('models/db.php');

if($_SESSION['id']!=2){
    header("Location: welcome");
    exit();
}
$nbComs = nbBooksTot();
if($nbComs[0] != 0){
if(!empty($_POST)){
	$limit = $_POST['nb'];
}else{
	$limit = "5";
}

// Chart 1
$response = getBdd()->prepare('SELECT a.title AS title, COUNT(ba.item_id) AS amount FROM article AS a, book_article AS ba WHERE a.id = ba.item_id GROUP BY ba.item_id ORDER BY amount DESC LIMIT '.$limit);
$response->execute();
while($row=$response->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	$json[] = $title;
	$json2[] = (int)$amount;
}
$maxElem = count($json);
if($maxElem < $limit){
	$limit = $maxElem;
}

// Chart 2

$response = getBdd()->prepare('SELECT c.name AS title, COUNT(ba.item_id) AS amount FROM article AS a, book_article AS ba, category AS c, sub_category AS sc WHERE a.id = ba.item_id AND sc.id = a.category_id AND c.id = sc.id_category GROUP BY c.name ORDER BY amount DESC');
$response->execute();
	while($row=$response->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	$json3[] = $title;
	$json4[] = (int)$amount;
}

// Chart 3

$response = getBdd()->prepare('SELECT sc.name AS title, COUNT(ba.item_id) AS amount FROM article AS a, book_article AS ba, category AS c, sub_category AS sc WHERE a.id = ba.item_id AND sc.id = a.category_id AND c.id = sc.id_category GROUP BY sc.name ORDER BY amount DESC');
$response->execute();
	while($row=$response->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	$json5[] = $title;
	$json6[] = (int)$amount;
}

$response -> closeCursor();
}
include 'views/stats.php';
?>