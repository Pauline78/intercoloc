<?php
/**
 * Created by PhpStorm.
 * User: paulineferaut
 * Date: 12/02/2018
 * Time: 14:42
 */

require_once('includes/init.inc.php');
$title = 'Les annonces';


/* Affichage des clients */
$query =$pdo->query ("SELECT id_clients, clients_sexe, clients_prenom, clients_nom, clients_age, clients_adresse, clients_cp, clients_ville, clients_phone, clients_situation, clients_coloc, DATE_FORMAT(created_at, '%d/%m/%Y - %H:%i') AS created_at, DATE_FORMAT(updated_at, '%d/%m/%Y - %H:%i') AS updated_at FROM clients");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

/* Affichage des annonces */
$query =$pdo->query ("SELECT * FROM annonce, clients WHERE (clients.id_clients = annonce.id_clients) AND ann_pf = " . $_SESSION['user']['client_pf'] . ";");
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('includes/haut.inc.php');

require_once('includes/nav_co.php');

?>
<main>
    <div class="row">
        <h1 class="col s6">Les annonces faites pour vous !</h1>
    </div>
    <h4>Triez par:</h4>
    <form class="flex flex-a width-60">

        <div class="width-100 marg-right-2">
            <select>
                <option value="" disabled selected>Spécialité</option>
                <option value="nonFumeur" >Non Fumeur</option>
                <option value="animal" >Animal</option>
                <option value="ascenseur" >Ascenseur</option>
            </select>
        </div>
        <button class="btn waves-light waves-effect orange darken-4" >Go</button>
    </form>
    <?php foreach($annonces as $key => $value) :?>
    <div class="row">

        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/photo1.jpg">
                    <div class="absolute pad-15px white" style="top: 0; right: 0;">
                        <h4>75%</h4>
                    </div>
                    <a class="btn-floating halfway-fab waves-effect waves-light orange darken-4" href="annonce_detail.php?detail=<?= $value["id_annonce"]?>"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <h3><?= $value['ann_title'] ?></h3>
                    <h4><?= $value['ann_price'] ?>€/mois </h4>
                    <p class="pad-bot-20px"><strong><?= $value['ann_adresse'] ?>, <?= $value['ann_cp'] ?> <?= $value['ann_ville'] ?></strong></p>
                    <p><?php
                        if($value['ann_fumeur'] == 1){
                            echo '<i class="material-icons pad-right-20px">smoke_rooms</i>';
                        } else {
                            echo '<i class="material-icons pad-right-20px">smoke_free</i>';
                        }
                        if ($value['ann_animal'] == 1){
                            echo '<i class="material-icons pad-right-20px">pets</i>';
                        }
                        if ($value['ann_ascenseur'] == 1){
                            echo '<i class="material-icons pad-right-20px">import_export</i>';
                        }
                        ?>
                    </p>
                    <p style="font-size: 0.8rem; padding-top: 5%;">Publié par <?= $value['clients_prenom'] ?> il y a 2 jour(s)</p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</main>



<?php
require_once ('includes/footer-co.inc.php');
require_once ('includes/bas.inc.php');

?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

