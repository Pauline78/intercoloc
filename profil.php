<?php
require_once('includes/init.inc.php');

$title = 'Profil de ' . $_SESSION['user']['clients_prenom'] . " " . $_SESSION['user']['clients_nom'] ;

/* Affichage des clients */
$query =$pdo->query ("SELECT id_clients, clients_sexe, clients_prenom, clients_nom, clients_age, clients_adresse, clients_cp, clients_ville, clients_phone, clients_situation, clients_coloc, DATE_FORMAT(created_at, '%d/%m/%Y - %H:%i') AS created_at, DATE_FORMAT(updated_at, '%d/%m/%Y - %H:%i') AS updated_at FROM clients LIMIT 3");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

/* Affichage des annonces */
$query =$pdo->query ("SELECT * FROM annonce, clients WHERE clients.id_clients = annonce.id_clients");
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['user'])) {
    /* Recuperation de l'annonce d'une personne */
    $query = $pdo->query("SELECT ann_title, ann_price, ann_sdb, ann_chambre_dispo FROM annonce WHERE id_clients = " . $_SESSION['user']['id_clients'] . ";");
    $coloc = $query->fetch(PDO::FETCH_ASSOC);
}

// print_r($coloc);
print_r($_SESSION);
print_r("<br/>");
print_r($_SESSION['user']['clients_coloc']);
print_r("<br/>");
print_r($_SESSION['user']['clients_age']);
// print_r($_SESSION['user']['id_clients']);

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
                            if (isset($_SESSION['user']) && ($_SESSION['user']['clients_sexe'] == "homme"))
                            echo '<img src="images/man.png">';
                            else
                            echo '<img src="images/avatar.png">';
                        ?>
                        </div>
                        <div class="pad-top-30px">
                            <h3><?php
                                if(isset($_SESSION['admin'])){
                                    echo $_SESSION['admin']['admin_user'];
                                }else {
                                    echo $_SESSION['user']['clients_prenom']. ' ' .$_SESSION['user']['clients_nom'];
                                }?>
                                 </h3>
                        </div>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">location_city</i>
                            <p><?php
                                if(isset($_SESSION['admin'])){
                                        echo "admin";
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
                                        echo "admin";
                                    }else {
                                        echo $_SESSION['user']['clients_sexe'];
                                    }?></p>
                            </div>
                            <div class="flex flex-a">
                                <i class="material-icons marg-right-20px">cake</i>
                                <p><?php
                                    if(isset($_SESSION['admin'])){
                                        echo "admin";
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
                                        echo "admin";
                                }else {
                                    echo $_SESSION['user']['clients_phone'];
                                }?></p>

                            <p><?php
                                if(isset($_SESSION['admin'])){
                                        echo "admin";
                                }else {
                                    echo $_SESSION['user']['clients_situation'];
                                }?></p>

                            <p><?php
                                if(isset($_SESSION['admin'])) :
                                    echo "admin";
                                else :
                                    if(isset( $_SESSION['user']) && $_SESSION['user']['clients_coloc'] == 'colocataire') :
                                    ?>
                                        Actif, cherche un(e) <?= $_SESSION['user']['clients_coloc'];
                                    else :
                                    ?>
                                        Senior, je propose une <?= $_SESSION['user']['clients_coloc'];
                                    endif;
                                endif;
                                ?>
                            </p>
                        </div>

                        <hr class="width-40">

                        <?php
                        if(isset( $_SESSION['user']) && $_SESSION['user']['clients_coloc'] == 'colocation') :
                        ?>
                        <div  class="col s12 m12 l6 flex-col no-marg marg-bot-2">
                            <h3 class="orange-text">Vous proposez :</h3>
                            <p><?= $coloc['ann_title'] ?></p>
                            <p><?= $coloc['ann_price'] ?> €</p>
                            <p><?php  if($coloc['ann_sdb'] == 1) echo "Salle de bain"; else echo "Pas de salle de bain"; ?></p>
                            <p><?php  if($coloc['ann_chambre_dispo'] == 1) echo "Chambre disponible"; else echo "Chambre non disponible"; ?></p>
                            <div>
                                <img class="width-60" src="images/annonce/photo2.jpg">
                            </div>
                        </div>
                        <?php
                        endif;
                        ?>

                        <li class="btn waves-light waves-effect blue darken-3 marg-top-2"><a class="white-text marg-bot-2" href="modification_profil.php?modification=<?= $_SESSION['user']['id_clients']; ?>">Modifier</a></li>
                    </div>


                </div>

            </div>

    </div>
</main>

<?php
require_once ('includes/footer_front.php');
require_once ('includes/bas.inc.php');
?>
