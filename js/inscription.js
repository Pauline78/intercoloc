var inscription = document.getElementById("inscription");
var formBouton = document.getElementById("inscription-zone-form-bouton");
var formMail = document.getElementById("inscription-zone-form-email");


/* CLIC SWITCH INSCRIPTION ACCUEIL*/
document.getElementById("suscribe-home").onclick = function (){
    inscription.style.right = "0%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "hidden";
};

/* CLIC SWITCH INSCRIPTION COMMENT*/
document.getElementById("suscribe-comment").onclick = function (){
    inscription.style.right = "0%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "hidden";
};

/* retour a la homepage en cliquant dans la navbar */
// VALEURS
document.getElementById("vers-valeur").onclick = function (){
    inscription.style.right = "-100%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "scroll";
};

// FONCTION
document.getElementById("vers-fonction").onclick = function (){
    inscription.style.right = "-100%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "scroll";
};

// CERTIF
document.getElementById("vers-certif").onclick = function (){
    inscription.style.right = "-100%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "scroll";
};

// TEMOIGNAGE
document.getElementById("vers-temoignage").onclick = function (){
    inscription.style.right = "-100%";
    inscription.style.transition = 'ease 0.7s';
    document.body.style.overflowY = "scroll";
};


/* CLIC FORM MAIL */
document.getElementById("reseau-mail").onclick = function (){
    formBouton.style.display = "none";
    formMail.style.display = "flex";
};

/* CLIC RETOUR MENU */
document.getElementById("retour-menu").onclick = function (){
    formBouton.style.display = "flex";
    formMail.style.display = "none";
};