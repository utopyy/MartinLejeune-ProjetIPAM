<?php
require_once 'models/articles.php';

$articleName = "BAR PROTEIN FOODSPRING";
$articleTab = getFullArticle($articleName);
//$articlePhoto = $articleTab[0]['photo_path'];
$articlePhoto = ROOT_PATH.'public/img/articleWelcome/banner-img.png'; //photo par défaut, remplacer cette ligne par la ligne 6 si changement d'article (juste du visuel ici)
$articlePrice = $articleTab[0]['price'];
$articleDesc =  $articleTab[0]['description'];

include 'views/welcome.php';
?>
