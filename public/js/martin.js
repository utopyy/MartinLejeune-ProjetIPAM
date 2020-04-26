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


