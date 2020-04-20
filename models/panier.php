<?php
function creationPanier(){
	if(!isset($_SESSION['panier'])){
		$_SESSION['panier']=array();
		$_SESSION['panier']['nameId'] = array();
		$_SESSION['panier']['path'] = array();
		$_SESSION['panier']['prixProduit'] = array();
		$_SESSION['panier']['prixTotalProduit'] = array();
		$_SESSION['panier']['qtProduit'] = array();
	}
	return true;
}

function ajouterArticle($nameId,$qtProduit,$prixProduit,$path){
	//Si le panier existe
	if(creationPanier()){
		//Si le produit existe déjà on ajoute seulement la quantité
		$positionProduit = array_search($nameId, $_SESSION['panier']['nameId']);
		//si le produit se trouve en index 0 cela pose probleme comme false=0 on doit mettre une seconde condition
		if(!empty($_SESSION['panier']['nameId'] && $_SESSION['panier']['nameId'][0] == $nameId) || $positionProduit!= false){
			$_SESSION['panier']['qtProduit'][$positionProduit] += $qtProduit;
			$_SESSION['panier']['prixTotalProduit'][$positionProduit] += $prixProduit;
		}else{
			//Sinon on ajoute le produit
			array_push($_SESSION['panier']['nameId'],$nameId);
			array_push($_SESSION['panier']['qtProduit'],$qtProduit);
			array_push($_SESSION['panier']['prixProduit'],$prixProduit);
			array_push($_SESSION['panier']['path'],$path);
			array_push($_SESSION['panier']['prixTotalProduit'],$prixProduit);
		}
	}else{
		$errorMessage = "Un problème est survenu...";
	}
}

function supprimerArticle($nameId){
	if (creationPanier()){
		$tmp=array();
		$tmp['nameId'] = array();
		$tmp['qtProduit'] = array();
		$tmp['prixProduit'] = array();
		$tmp['path'] = array();
		$tmp['prixTotalProduit'] = array();
		//Si le produit existe en plusieurs exemplaires on supprime seulement un article
		echo nbSameArticle($nameId);
		if(nbSameArticle($nameId)>1){
		$positionProduit = array_search($nameId, $_SESSION['panier']['nameId']);	
			$_SESSION['panier']['qtProduit'][$positionProduit] -= 1;
			$_SESSION['panier']['prixTotalProduit'][$positionProduit] -= $_SESSION['panier']['prixProduit'][$positionProduit];
		}else{
		// sinon on créé le panier sans l'élément à supprimer
		for($i=0;$i<count($_SESSION['panier']['nameId']);$i++){
			if($_SESSION['panier']['nameId'][$i] != $nameId){
				array_push($tmp['nameId'],$_SESSION['panier']['nameId'][$i]);
				array_push($tmp['qtProduit'],$_SESSION['panier']['qtProduit'][$i]);
				array_push($tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
				array_push($tmp['path'],$_SESSION['panier']['path'][$i]);
				array_push($tmp['prixTotalProduit'], $_SESSION['panier']['prixTotalProduit'][$i]);
			}
		}
		$_SESSION['panier'] = $tmp;
		unset($tmp);
		}
	}
	else{
		$errorMessage = "Un problème est survenu...";
	}
}

function modifierQTeArticle($nameId,$qtProduit){
   //Si le panier existe
   if (creationPanier()){
		//Si la quantité est positive on modifie sinon on supprime l'article
		if ($qtProduit > 0){
         //Recherche du produit dans le panier
			$positionProduit = array_search($nameId,  $_SESSION['panier']['nameId']);
			if ($positionProduit != false){
				$_SESSION['panier']['qtProduit'][$positionProduit] = $qtProduit ;
			}
		}else{
		supprimerArticle($nameId);
		}
	}else{
	$errorMessage = "Un problème est survenu...";
	}
}

function montantTotal(){
   $total=0;
   for($i =0;$i<count($_SESSION['panier']['nameId']); $i++)
   {
      $total += $_SESSION['panier']['qtProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function nbSameArticle($nameId){
	$cpt=0;
	for($i=0;$i<count($_SESSION['panier']['nameId']);$i++){
		if($_SESSION['panier']['nameId'][$i] == $nameId){
			$cpt = $_SESSION['panier']['qtProduit'][$i];
		}
	}
	return $cpt;
}

function supprimerPanier(){
	unset($_SESSION['panier']);
}
?>