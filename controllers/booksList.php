<?php
require_once('models/book.php');

if(!empty($_GET['idCom'])){
	$book = getBook($_GET['idCom']);
	$priceTot = getPriceBook($_GET['idCom']);
	include 'views/bookDetail.php';
}else{
	$nbBooks = nbBooksByUser($_SESSION['id']);
	if($nbBooks>0){
		$books = booksByUser($_SESSION['id']);
	}
	include 'views/booksList.php';
}

?>
