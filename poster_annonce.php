<?php
$title = 'Poster une annonce';
require_once('includes/haut.inc.php');

?>

<main>

    <h1 class="center-align marron-text engras">Ajouter une annonce</h1>

		<div class="row">
		<form action="ajout_annonce.php" method="post" enctype="multipart/form-data"  class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="title" type="text" class="validate">
                <label for="title">Titre de l'annonce</label>
            </div>
				</div>
        <div class="row">
            <div class="input-field col s6">
                <input id="price" type="number" class="validate">
                <label for="price">Quel est le prix du loyer par mois ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="descrition" type="text" class="validate">
                <label for="description">Description</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="ville" type="text" class="validate">
                <label for="ville">Ville</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="cp" type="text" class="validate">
                <label for="cp">Code Postal</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="adresse" type="text" class="validate">
                <label for="adresse">Adresse</label>
            </div>
        </div>
        <div class="row">
            <div>
                <select name="sexe">
                    <option value="" disabled selected>---</option>
                    <option value="homme">Un homme</option>
                    <option value="femme">Une femme</option>
                </select>
                <label>Vous préféreriez vivre avec</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="travail">
                    <option value="" disabled selected>---</option>
                    <option value="etudiant">Etudiant</option>
                    <option value="salarié">Actif</option>
                    <option value="retraité">Retraité</option>
                </select>
                <label>Vous êtes</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="sexe">
                    <option value="" disabled selected>---</option>
                    <option value="1 à 6 mois">1 à 6 mois</option>
                    <option value="1 an">1 an</option>
                    <option value="Indéfinis">Indéfinis</option>
                </select>
                <label>Pour combien de temps cherchez vous un colocataire</label>
            </div>
        </div>
				<div class="row">
            <div class="input-field col s6">
                <input id="chambre" type="number" class="validate">
                <label for="chambre">Combien de chambres disponibles ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="sdb" type="number" class="validate">
                <label for="sdb">Combien de salle d'eaux disponibles ?</label>
            </div>
        </div>
				<div class="row">
            <div class="input-field col s6">
                <input id="wc" type="number" class="validate">
                <label for="wc">Combien de toilettes disponibles ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="internet" value="0" name="sdv" type="radio" class="validate">non
                <input id="internet" value="1" name="sdv" type="radio" class="validate">oui
                <label for="internet">Vous avez internet ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="alarme" value="0" name="sdv" type="radio" class="validate">non
                <input id="alarme" value="1" name="sdv" type="radio" class="validate">oui
                <label for="alarme">Vous avez une alarme ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="sdb" value="0" name="sdv" type="radio" class="validate">non
                <input id="sdb" value="1" name="sdv" type="radio" class="validate">oui
                <label for="sdb">Vous avez la télévision ?</label>
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
        <div class="input-field col s6">
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
        </div>

        <input type="submit" class="btn marron-bg" name="envoyer">

    </form>
		</div>
</main>


<?php
require_once ('includes/footer-co.inc.php');
require_once ('includes/bas.inc.php');

?>
<script  type="text/javascript">
    $(document).ready(function() {
        Materialize.updateTextFields();
    });

</script>
