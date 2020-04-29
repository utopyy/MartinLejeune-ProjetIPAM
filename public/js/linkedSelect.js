var sel1 = document.querySelector('#categorieSel');
var sel2 = document.querySelector('#subcatSel');
var options2 = sel2.querySelectorAll('option');
var select = $( "#subcatSel option:selected" ).text(); // on récupère la valeur sélectionnée par défaut


function giveSelection(selValue) {
  sel2.innerHTML = '';
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }
  }
}

giveSelection(sel1.value); // on active la fonction (pour que les select box s'initialisent correctement)
$('#subcatSel').val(select); // on redefinit le choix par défaut des select box


