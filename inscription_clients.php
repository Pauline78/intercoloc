<?php
require_once('includes/init.inc.php');
$title = 'Inscription Inter\'Coloc';

if(isset($_GET['suivant']) && is_numeric($_GET['suivant']))
{
    $getClient = $pdo->prepare('SELECT * FROM clients WHERE id_clients = :id');
    $getClient->bindValue(':id', $_GET['suivant'], PDO::PARAM_INT);
    $getClient->execute();
    $resultat = $getClient->fetch(PDO::FETCH_ASSOC);
}


require_once('includes/haut.inc.php');
?>
<main class="width-100 flex flex-col flex-c-c"
<div class="width-80 background-gris border-radius-7">
    <h1><?= $title ?></h1>


    <form id="form-inscription" action="<?= (!empty($resultat)) ? 'admin/traitement-ajout-client.php' : 'admin/traitement-ajout-client.php' ?>" enctype="multipart/form-data" method="post">
        <div class="flexcheckbox">
            <legend>Vous êtes ...</legend>
            <div class="flex flex-row">
                <input type="checkbox" name="sexe" value="un homme"><label for="sexe">un homme</label>
            </div>
            <div class="flex flex-row">
                <input type="checkbox" name="sexe" value="une femme"><label for="sexe">une femme</label>
            </div>
        </div>

        <div class="flex">
            <div class="flex-col l4">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?= (!empty($resultat)) ? $resultat['prenom'] : '' ?>">
            </div>
            <div class="flex-col l4">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?= (!empty($resultat)) ? $resultat['nom'] : '' ?>">
            </div>
        </div>


        <div class="flex">
            <div class="flex-col l4">
                <label for="age">Âge :</label>
                <select name="age">
                    <?php
                    for($i=15; $i<=90;$i++) :  //Liste des ages de 15 à 90 ans
                        ?>
                        <OPTION value="<?= $i ?>"><?= $i ?> <br></OPTION>";
                    <?php endfor; ?>
                </select>
            </div>
            <div class="flex-col l4">
                <label for="email">E-mail :</label>
                <input type="email" name="email" value="<?= (!empty($resultat)) ? $resultat['email'] : '' ?>">
            </div>
            <div class="flex-col l4">
                <label for="paswword">Mot de passe :</label>
                <input type="password" name="password" value="<?= (!empty($resultat)) ? $resultat['password'] : '' ?>">
            </div>
        </div>

        <div class="flex">
            <div class="flex-col l4">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" value="<?= (!empty($resultat)) ? $resultat['adresse'] : '' ?>">
            </div>
            <div class="flex-col l4">
                <label for="cp">Code Postal :</label>
                <input type="text" name="cp" value="<?= (!empty($resultat)) ? $resultat['cp'] : '' ?>">
            </div>
            <div class="flex-col l4">
                <label for="ville">Ville :</label>
                <input type="text" name="ville" value="<?= (!empty($resultat)) ? $resultat['ville'] : '' ?>">
            </div>

        </div>

        <div class="flex">

            <div class="flex-col l4">
                <label for="phone">Numéro de téléphone :</label>
                <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" value="<?= (!empty($resultat)) ? $resultat['phone'] : '' ?>">
            </div>
            <div class="flex-col l4">
                <label for="situation">Situation :</label>
                <select name="situation">
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


        <div>
            <button name="suivant" type="submit" class="btn-orange">Suivant</button>
        </div>


    </form>

</div>



</main>

<?php
    require_once('includes/bas.inc.php')
?>