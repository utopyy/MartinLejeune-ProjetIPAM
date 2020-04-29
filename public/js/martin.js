// Fenetres de confirmation + redirections
function validateCom(){
	if (confirm("Valider la commande?")){
		window.location.href = "book";
	}
}

function deleteCom(){
	if (confirm("Vider le panier?")){
		window.location.href = "panier?delete=all";
	}
}

function confirmProfil(){
	if (confirm("Sauvegarder les modifications?")){
		window.location.href = "profil";
	}
}

function check_image_mime($tmpname){
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mtype = finfo_file($finfo, $tmpname);
	if(strpos($mtype, 'image/') === 0){
finfo_close($finfo);
		return true;
	} else {
finfo_close($finfo);
		return false;
	}
}