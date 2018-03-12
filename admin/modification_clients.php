<?php
require_once('../includes/init.inc.php');
$title = 'Modification client';

if(!empty($_SESSION['old_values'])) {
    extract($_SESSION['old_values']); // je fabrique des variables a partir des cles du tableau DONC $_SESSION['titre'] devient $titre
    unset($_SESSION['old_values']); // j'ai recupere les infos de ol_values, je peux detruire ce tableau.
}

if(isset($_POST['enregistrement']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone'])
){
    $ok=true;

    if (!preg_match('#^[0-9]{10}$#',$_POST['telephone'])){
        $_SESSION['error_message'][] = 'Le numéro de téléphone doit contenir 10 chiffres';
        $ok=false;
    }   elseif(strlen($_POST['nom'])< 3) {
        $_SESSION['error_message'][] = 'Le nom doit contenir plus de 3 caractère';
        $ok=false;
    } elseif (strlen($_POST['prenom'])< 3) {
        $_SESSION['error_message'][] = 'Le prénom doit contenir plus de 3 caractère';
        $ok=false;
    } elseif($ok){
        $modif = $pdo->prepare("UPDATE annuaire 
			SET nom=:nom,
			 prenom=:prenom,
			 telephone=:telephone,
			 profession = :profession, 
			 ville=:ville, 
			 codepostal = :codepostal, 
			 adresse=:adresse,
			 date_naissance =:date_naissance,
			 sexe= :sexe, 
			 description = :description
			WHERE id_annuaire =".$_GET['id_mod']);


        $modif-> bindValue(':nom', $_POST['nom'], PDO::PARAM_STR );
        $modif-> bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR );
        $modif-> bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $modif-> bindValue(':profession', $_POST['profession'], PDO::PARAM_STR );
        $modif-> bindValue(':ville', $_POST['ville'], PDO::PARAM_STR );
        $modif-> bindValue(':codepostal', $_POST['codepostal'], PDO::PARAM_INT);
        $modif-> bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
        $modif-> bindValue(':date_naissance', $_POST['date_naissance']);
        if ($_POST['sexe'] == 0) {
            $sexe = 'm';
        } elseif($_POST['sexe'] == 1){
            $sexe ='f';
        }
        $modif-> bindValue(':sexe', $sexe);
        $modif-> bindValue(':description', $_POST['description'], PDO::PARAM_STR);


        $modification = $modif->execute();
        header('Location: affichage_annuaire.php');
    }
}else {
    $_SESSION['error_message'][] = 'Les champs obligatoires sont vides';
}


$query =$pdo->query ("SELECT* FROM clients WHERE id_clients=".$_GET['modification']);
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('../includes/haut.inc.php');

?>

<div class="row">
    <h1 class="center-align"><?= $title ?></h1>

    <?php
    foreach($utilisateurs as $key => $value) :
    ?>
    <form action="traitement-modif-clients.php?modification=<?= $_GET["modification"]; ?>" enctype="multipart/form-data" method="post" class="col s12 m12 offset-l3 l6">
        <div class="flex-col l3">
            <label for="sexe">Vous êtes ...</label>
                <input type="checkbox"  id="filled-in-box" value="homme" name="sexe" <?php if ($value['clients_sexe'] == 'homme'){echo 'checked';} ?> />
                <label for="filled-in-box" class="pad-right-20px">Homme</label>

                <input type="checkbox" id="filled-in-box2" value="femme"  name="sexe" <?php if ($value['clients_sexe'] == 'femme'){echo 'checked';} ?>/>
                <label for="filled-in-box2">Femme</label>
        </div>

        <div class="flex">
            <div class="flex-col l4">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?= $value['clients_prenom'] ?>">
            </div>
            <div class="flex-col l4">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?= $value['clients_nom'] ?>">
            </div>
            <div class="flex-col l4">
                <label for="age">Âge :</label>
                <input type="text" class="datepicker" name="age">
            </div>
        </div>


        <div class="flex">
            <div class="flex-col l4">
                <label for="email">E-mail :</label>
                <input type="email" name="email" value="<?= $value['clients_email'] ?>">
            </div>
            <div class="flex-col l4">
                <label for="paswword">Mot de passe :</label>
                <input type="password" name="password" value="<?= $value['clients_password'] ?>">
            </div>
        </div>

        <div class="flex">
            <div class="flex-col l4">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?= $value['clients_adresse'] ?>">
            </div>
            <div class="flex-col l4">
                <label for="cp">Code Postal :</label>
                <input type="text" name="cp" value="<?= $value['clients_cp'] ?>">
            </div>
            <div class="flex-col l4">
                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?= $value['clients_ville'] ?>">
            </div>

        </div>

        <div class="flex">

            <div class="flex-col l4">
                <label for="phone">Numéro de téléphone :</label>
                <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" value="<?= $value['clients_phone'] ?>">
            </div>

            <div class="flex-col l4">
                <label for="situation">Situation :</label>
                    <select name="situation">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Celibataire">Célibataire</option>
                        <option value="Marie">Marié(e)</option>
                        <option value="Divorce">Divorcé(e)</option>
                        <option value="Veuf">Veuf/Veuve</option>
                    </select>
            </div>

            <div class="flex-col l4">
                <label>Vous êtes à la recherche...</label>
                <select name="coloc">
                    <option value="colocataire">d'un colocataire</option>
                    <option value="colocation">d'une colocation</option>
                </select>
            </div>
        </div>

        <span class="marg-top-2 marg-bot-2">
						<input type="checkbox" id="newsletter" name="newsletter" value="<?= $value['client_newsletter'] ?>" <?php if ($value['client_newsletter'] == '1'){echo 'checked';} ?>>
						<label for="newsletter">M'inscrire à la newsletter ?</label>
					</span>


        <div>
            <button name="enregistrement" type="submit" class="btn btn-primary">Modifier</button>
        </div>


    </form>
    <?php
        endforeach;
    ?>

</div>
<?php
require_once ('../includes/bas.inc.php');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 70, // Creates a dropdown of 15 years to control year,
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jui', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
        weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        max: 10,
        today: 'Aujourd\'hui',
        clear: 'Effacer',
        close: 'Ok',
        closeOnSelect: true // Close upon selecting a date,
    });


</script>
