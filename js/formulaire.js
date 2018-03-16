/*
setInterval(function() {
	var form = document.getElementById("form");
	var bouton = document.getElementById("send");
	var un = document.getElementById("form-1");
	var deux = document.getElementById("form-2");
	var trois = document.getElementById("form-2");
	
	
	bouton.onclick=function(e){
	
		if ($('#send').hasClass('vers-form-page-deux')){
			un.style.display = "none";
			deux.style.display = "flex";
			trois.style.display = "flex";

		}else if ($('#send').hasClass('vers-form-page-trois')){
			un.style.display = "none";
			deux.style.display = "flex";
			
		}else if ($('#send').hasClass('vers-form-result')){
			un.style.display = "none";
			deux.style.display = "flex";
			
		}
		
		
	}
},500);
*/

// l'id de la fonction c'est l'id du formulaire (exemple: id = 1 -> la j'aurai form-1)
function addPoint(id) {

    var profils = [																	// on récupere les valeurs des differents profil (qui sont en hidden) pour pouvoir les modifier plus tard
        document.getElementById("p1"),
        document.getElementById("p2"),
        document.getElementById("p3"),
        document.getElementById("p4")
    ];

    var quest = document.getElementById("form-" + id).getElementsByTagName('ul');	// on recupere toutes les questions pour le formulaire actuel

    for (var n = 0; quest[n]; n++) {												// On boucle tant qu'il y a des questions

		for (var c = 0; quest[n].getElementsByTagName('input')[c]; c++) {			// On boucle tant qu'il y a des choix pour la question
			if (quest[n].getElementsByTagName('input')[c].checked == true) {		// La condition est verifiée seulement lorsqu'on trouve une checkbox cochée
				profils[c].value = parseInt(profils[c].value) + 1;
			}
		}
	}
    if (document.getElementById('form-'+(id+1))) {
        document.getElementById('form-' + id).style.display = 'none';						// le form "1" passe en display none
        document.getElementById('form-' + (id + 1)).style.display = 'initial';				// le +1 fait que "si le form 2 existe, alors le form 2 passe en display flex
    }
    else {
    	document.getElementById('formulaire').innerHTML = "<h1>Fin du formulaire</h1><div class='form_send'><input type='submit' name='OK' value='Terminer' id='valider'></div>";	// on transforme le bouton suivant en submit
    }
}