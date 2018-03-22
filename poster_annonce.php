<?php
$title = 'Poster une annonce';
require_once('includes/haut.inc.php');

?>

<main>

    <h1 class="center-align marron-text engras">Ajouter une annonce</h1>

		<div class="row">
		<form action="traitement-annonce.php" method="post" enctype="multipart/form-data"  class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="title" name="title" type="text" class="validate">
                <label for="title">Titre de l'annonce</label>
            </div>
				</div>
        <div class="row">
            <div class="input-field col s6">
                <input id="price" name="price" type="number" class="validate">
                <label for="price">Quel est le prix du loyer par mois ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="description" name="description" type="text" class="validate">
                <label for="description">Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="ville" name="ville" type="text" class="validate">
                <label for="ville">Ville</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="cp" name="cp" type="text" class="validate">
                <label for="cp">Code Postal</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="adresse" name="adresse" type="text" class="validate">
                <label for="adresse">Adresse</label>
            </div>
        </div>
        <div class="row">
            <div>
                <select name="sexe">
                    <option value="" disabled selected>---</option>
                    <option value="homme" name="sexe">Un homme</option>
                    <option value="femme" name="sexe">Une femme</option>
                </select>
                <label>Vous préféreriez vivre avec</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="travail">
                    <option value="" disabled selected>---</option>
                    <option value="etudiant" name="travail">Etudiant</option>
                    <option value="salarié" name="travail">Actif</option>
                    <option value="retraité"name="travail">Retraité</option>
                </select>
                <label for="travail">Vous êtes</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="temps">
                    <option value="" disabled selected>---</option>
                    <option value="1 à 6 mois" name="temps">1 à 6 mois</option>
                    <option value="1 an" name="temps">1 an</option>
                    <option value="Indéfinis" name="temps">Indéfinis</option>
                </select>
                <label>Pour combien de temps cherchez vous un colocataire</label>
            </div>
        </div>
				<div class="row">
            <div class="input-field col s6">
                <input id="chambre" name="chambre" type="number" class="validate">
                <label for="chambre">Combien de chambres disponibles ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="sdb" name="sdb" type="number" class="validate">
                <label for="sdb">Combien de salle d'eaux disponibles ?</label>
            </div>
        </div>
				<div class="row">
            <div class="input-field col s6">
                <input id="wc" name="wc" type="number" class="validate">
                <label for="wc">Combien de toilettes disponibles ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="ascenseur" value="0" name="ascenseur" type="radio" class="validate">non
                <input id="ascenseur" value="1" name="ascenseur" type="radio" class="validate">oui
                <label for="ascenseur">Votre immeuble possède t'il un ascenseur ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="internet" value="0" name="internet" type="radio" class="validate">non
                <input id="internet" value="1" name="internet" type="radio" class="validate">oui
                <label for="internet">Vous avez internet ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="alarme" value="0" name="alarme" type="radio" class="validate">non
                <input id="alarme" value="1" name="alarme" type="radio" class="validate">oui
                <label for="alarme">Vous avez une alarme ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="tele" value="0" name="tele" type="radio" class="validate">non
                <input id="tele" value="1" name="tele" type="radio" class="validate">oui
                <label for="tele">Vous avez la télévision ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="animal" value="0" name="animal" type="radio" class="validate">non
                <input id="animal" value="1" name="animal" type="radio" class="validate">oui
                <label for="animal">Vous tolerez les animaux</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="fume" value="0" name="fume" type="radio" class="validate">non
                <input id="fume" value="1" name="fume" type="radio" class="validate">oui
                <label for="fume">Vous tolerez les fumeurs</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="transport" value="0" name="transport" type="radio" class="validate">non
                <input id="transport" value="1" name="transport" type="radio" class="validate">oui
                <label for="transport">Moyens de transports proche</label>
            </div>
        </div>
		<hr>
        <!--<div class="input-field col s6">
            <div class="btn marron-bg">
                <span>Photo principale</span>
                <input type="file" id="photo_principale_article" name="photo_principale">
            </div>
        </div>

        <div class="input-field col s6">
            <div class="btn marron-bg">
                <span>Ajouter d'autres photos à l'article</span>
                <input type="file"  id="photo_autre_article" multiple name="autre_photo[]">
            </div>
        </div>-->

        <input type="submit" class="btn marron-bg" name="envoyer">

    </form>
		</div>
</main>


<?php
require_once ('includes/footer-co.inc.php');
// require_once ('includes/bas.inc.php');

?>
<!--<script  type="text/javascript">
    $(document).ready(function() {
        Materialize.updateTextFields();
    });

</script>-->
