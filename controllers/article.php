<?php
require_once('models/articles.php');

//Si un user tente d'écrire monprojet.test/article: probleme (car aucun article passé dans l'url)
if(empty(ARTICLE_REF) && empty($_GET['name'])){
	header('Location: shop');
	exit();
}

//traitement des erreurs
if(!empty($_GET['error'])){
	switch ($_GET['error']) {
    case "title":
        $errorMessage = "Un article portant ce nom existe déjà ou a été supprimé, veuillez changer de nom";
        break;
    case "format":
        $errorMessage = "Format de fichier invalide";
        break;
    case "dimension":
        $errorMessage = "Largeur et hauteur de l'image sont différentes";
        break;
    default:
       $errorMessage = "Erreur";
	} 
}

// Si il n'y a pas de modification (qu'on veut juste afficher la page détail d'un article)
if(empty($_POST)){ 
	$articleName = str_replace("-", " ", ARTICLE_REF);
	$articleTab = getFullArticle($articleName); // créé un tableau contenant un tableau avec les infos d'un article
	if(empty($articleTab)){
		header('Location: '.ROOT_PATH.'shop');
		exit();
	}else{
		$article = $articleTab[0]; //extraction du tableau 
		include 'views/article.php';
	}
// Si dans la page article on veut modifier un article (traitement puis on refresh la page)
}else{
	$title = strtoupper(str_replace("-", " ", $_POST['title']));
	$oldtitle = $_GET['name']; // j'ai fait passer l'ancien nom de l'article en get pour récupérer ses données
	$articleTab = getFullArticle($oldtitle);
	if(exists($title) && $title!=strtoupper(str_replace("-", " ", $oldtitle))){ // si le titre existe déjà on recharge le controller avec un $_get error de type : title
		header('Location: article/'.strtolower(str_replace(" ", "-", $articleTab[0]['subName'])).'/'.strtolower(str_replace(" ", "-", $oldtitle)).'?error=title');
		exit();
	}else{
		$photo_path = $articleTab[0]['photo_path'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$subcat = $_POST['subcatSel'];
		$typefichier = $_FILES ['image'] ['type']; // on récupère le type de fichier
		$types_fichiers_autorises = array ('image/jpeg', 'image/pjpeg', 'image/png'); // on crée un tableau avec les extensions acceptées
	}
	if($_FILES['image']['error'] == 0){ // on vérifie si un fichier a été upload
		if(in_array($typefichier, $types_fichiers_autorises)){ // on vérifie que le mime est ok
			$img = $_FILES['image']['tmp_name']; // on récupère le nom de l'image
			if(getimagesize($img)[0] == getimagesize($img)[1]){
				unlink($photo_path); // suppression de l'ancienne image
				$newName = rand(1,1000); // creation d'un nombre aleatoire
				$newName = $newName.time(); // ajout de .time() pour le rendre unique
				$newName = $newName.".jpg"; // ajout de l'extension jpg 
				$photo_path = "public/img/upload/".$newName;
				move_uploaded_file($_FILES['image']['tmp_name'], $photo_path);
			}else{
				header('Location: article/'.strtolower(str_replace(" ", "-", $articleTab[0]['subName'])).'/'.strtolower(str_replace(" ", "-", $oldtitle)).'?error=dimension');
				exit();
			}
		}else{
			header('Location: article/'.strtolower(str_replace(" ", "-", $articleTab[0]['subName'])).'/'.strtolower(str_replace(" ", "-", $oldtitle)).'?error=format');
			exit();
		}
	}
	updateArticle($oldtitle, $title, $price, $description, $subcat, $photo_path);
	header('Location: article/'.strtolower(str_replace(" ", "-",($_POST['subcatSel']))).'/'.strtolower(str_replace(" ", "-", $title)));
	exit();
}
?>
