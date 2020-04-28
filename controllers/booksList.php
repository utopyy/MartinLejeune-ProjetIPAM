<?php
require_once('models/book.php');
if(empty($_SESSION['id'])){
	header('Location: welcome');
	exit();
}
if(!empty($_GET['idCom'])){
	$book = getBook($_GET['idCom']);
	$priceTot = getPriceBook($_GET['idCom']);
	include 'views/bookDetail.php';
}else{
	if($_SESSION['userRole']==1){
		$nbBooks = nbBooksByUser($_SESSION['id']);
		if($nbBooks>0){
			$books = booksByUser($_SESSION['id']);
		}
	}else{
		$nbBooks = nbBooksTot();
		if($nbBooks>0){
			$books = booksTot();
		}
	}
	include 'views/booksList.php';
}
?>
