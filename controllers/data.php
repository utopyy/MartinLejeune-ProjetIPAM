<?php
require_once 'models/articles.php';

$data = getBestSellers();
foreach($data as $row){
	$title = $row['title'];
	$amount = $row['amount'];
}
?>