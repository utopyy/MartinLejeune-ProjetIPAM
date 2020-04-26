<?php
require_once 'models/articles.php';

$data = getBestSellers();
include 'views/stats.php';
print_r($data);
?>