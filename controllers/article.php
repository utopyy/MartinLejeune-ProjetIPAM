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
	case "taille":
		$errorMessage = "Le titre de l'article ne peut pas dépasser 20 caractères";
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
	$title = strtoupper(clearText(str_replace("-", " ", $_POST['title'])));
	$oldtitle = $_GET['name']; // j'ai fait passer l'ancien nom de l'article en get pour récupérer ses données
	$articleTab = getFullArticle($oldtitle);
	$subName = strtolower(str_replace(" ", "-", $articleTab[0]['subName']));
	$oldtitleSanit = strtolower(str_replace(" ", "-", $oldtitle));
	if(strlen($title)>20){
		header('Location: article/'.$subName.'/'.$oldtitleSanit.'?error=taille');
		exit();
	}
	if(exists($title) && $title!=strtoupper(str_replace("-", " ", $oldtitle))){ // si le titre existe déjà on recharge le controller avec un $_get error de type : title
		header('Location: article/'.$subName.'/'.$oldtitleSanit.'?error=title&cat='.$oldtitle);
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
				header('Location: article/'.$subName.'/'.$oldtitleSanit.'?error=dimension');
				exit();
			}
		}else{
			header('Location: article/'.$subName.'/'.$oldtitleSanit.'?error=format');
			exit();
		}
	}
	updateArticle($oldtitle, $title, $price, $description, $subcat, $photo_path);
	header('Location: article/'.strtolower(str_replace(" ", "-",($_POST['subcatSel']))).'/'.strtolower(str_replace(" ", "-", $title)));
	exit();
}

function clearText($str){
$str = trim($str);
$old_chars = array('Š', 'š', 'Ž', 'ž', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù',
					'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ',
					'ö', 'ø', 'ù', 'ú', 'û', 'ý', 'ÿ');
$new_chars = array('S', 's', 'Z', 'z', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U',
					'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o',
					'o', 'o', 'u', 'u', 'u', 'y', 'y');
$safe_str = strtr($str, array_combine($old_chars, $new_chars));
return $safe_str;
}
?>
