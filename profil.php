<?php
require_once('includes/init.inc.php');
$title = 'Profil';


/* Affichage des clients */
$query =$pdo->query ("SELECT id_clients, clients_sexe, clients_prenom, clients_nom, clients_age, clients_adresse, clients_cp, clients_ville, clients_phone, clients_situation, clients_coloc, DATE_FORMAT(created_at, '%d/%m/%Y - %H:%i') AS created_at, DATE_FORMAT(updated_at, '%d/%m/%Y - %H:%i') AS updated_at FROM clients LIMIT 3");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

/* Affichage des annonces */
$query =$pdo->query ("SELECT * FROM annonce, clients WHERE clients.id_clients = annonce.id_clients");
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('includes/haut.inc.php');

require_once('includes/nav_co.php');

?>

<main class="row">
    <div class="col s12 m12 offset-l1 l10 flex flex-c-c marg-top-5 card border-radius-10 pad-bot-20px">
            <div class="col 12 m12 l12 marg-top-2">
                <div>
                    <div class="flex flex-col flex-a center">
                        <div id="avatar" class=" light-blue darken-3 flex flex-c-c">
                        <?php
                            if ($_SESSION['user']['clients_sexe'] == "homme")
                            echo '<img src="images/man.png">';
                            else
                            echo '<img src="images/avatar.png">';
                        ?>
                        </div>
                        <div class="pad-top-30px">
                            <h3><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['clients_prenom']. ' '.$_SESSION['admin']['clients_nom'] ;
                                }else {
                                    echo $_SESSION['user']['clients_prenom']. ' ' .$_SESSION['user']['clients_nom'];
                                }?>
                                 </h3>
                        </div>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">location_city</i>
                            <p><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['clients_adresse']. ' '.$_SESSION['admin']['clients_cp']. ' '.$_SESSION['admin']['clients_ville'] ;
                                }else {
                                    echo $_SESSION['user']['clients_adresse']. ' ' .$_SESSION['user']['clients_cp']. ' ' .$_SESSION['user']['clients_ville'];
                                }?>
                            </p>
                        </div>
                        <div class="flex">
                            <div class="flex flex-a marg-right-20px">
                                <i class="material-icons marg-right-20px">person</i>
                                <p><?php
                                    if(isset($_SESSION['admin'])){
                                        echo $_SESSION['admin']['clients_sexe'];
                                    }else {
                                        echo $_SESSION['user']['clients_sexe'];
                                    }?></p>
                            </div>
                            <div class="flex flex-a">
                                <i class="material-icons marg-right-20px">cake</i>
                                <p><?php
                                    if(isset($_SESSION['admin'])){
                                        echo $_SESSION['admin']['clients_age'];
                                    }else {
                                        echo $_SESSION['user']['clients_age'];
                                    }?></p>
                            </div>
                        </div>

                        <hr>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">warning</i>
                            <p>Quelques spécificités :</p><br>
                        </div>
                        <div class="flex flex-a">
                            <p>Pas d'animal de compagnie - Femme uniquement</p>
                        </div>

                        <hr class="width-40">

                        <div  class="col s12 m12 l6 flex-col no-marg marg-bot-2">
                            <h3 class="orange-text">Résumé</h3>
                            <p><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['clients_phone'];
                                }else {
                                    echo $_SESSION['user']['clients_phone'];
                                }?></p>

                            <p><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['clients_situation'];
                                }else {
                                    echo $_SESSION['user']['clients_situation'];
                                }?></p>

                            <p><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['clients_coloc'];
                                }else {
                                    echo $_SESSION['user']['clients_coloc'];
                                }?></p>
                        </div>

                        <hr class="width-40">

                        <?php
                        if($_SESSION['user']['clients_coloc'] == 'colocataire') :

                        ?>
                        <div  class="col s12 m12 l6 flex-col no-marg marg-bot-2">
                            <h3 class="orange-text">Colocation disponible</h3>
                            <p><?= $annonces['ann_title'] ?></p>
                            <p><?= $_SESSION['user']['ann_price'] ?></p>
                            <p><?= $_SESSION['user']['ann_sdb'] ?></p>
                            <p><?= $_SESSION['user']['ann_chambre_dispo'] ?></p>
                            <div>
                                <img class="width-60" src="images/annonce/photo2.jpg">
                            </div>
                        </div>
                        <?php
                        endif;
                        ?>

                        <li class="btn waves-light waves-effect blue darken-3 marg-top-2"><a class="white-text marg-bot-2" href="connexion.php">Modifier</a></li>
                    </div>


                </div>

            </div>

    </div>
</main>

<?php
require_once ('includes/footer_front.php');
require_once ('includes/bas.inc.php');
?>
