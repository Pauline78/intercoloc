<?php
/**
 * Created by PhpStorm.
 * User: paulineferaut
 * Date: 12/02/2018
 * Time: 14:42
 */

require_once('includes/init.inc.php');
$title = 'Colocation 1';
require_once('includes/haut.inc.php');

/* Affichage des clients */
$query =$pdo->query ("SELECT * FROM clients");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

/* Affichage des annonces */
$query =$pdo->query ("SELECT * FROM annonce, clients WHERE clients.id_clients = annonce.id_clients AND id_annonce = ".$_GET['detail']);
$annonces = $query->fetch(PDO::FETCH_ASSOC);


require_once('includes/nav_co.php');

?>


<div class="carousel carousel-slider center" data-indicators="true" xmlns="http://www.w3.org/1999/html">
        <div class="carousel-item  white-text height-60vh" href="#one!">
            <img class="height-60vh" src="images/annonce/photo1.jpg">
        </div>
        <div class="carousel-item  white-text" href="#two!">
            <img class="height-60vh" src="images/annonce/photo2.jpg">
        </div>
        <div class="carousel-item  white-text" href="#three!">
            <img class="height-60vh" src="images/annonce/photo3.jpg">
        </div>
        <div class="carousel-item  white-text" href="#four!">
            <img class="height-60vh" src="images/annonce/photo4.jpg">
        </div>
    </div>
<main class="flex row marg-top-5">
    <div class="col s12 m12 l8">
        <h1><?= $annonces['ann_title'] ?> - <?= $annonces['ann_price'] ?>€/mois - 75%</h1>
        <h4><?= $annonces['ann_adresse'] ?>, <?= $annonces['ann_cp'] ?> <?= $annonces['ann_ville'] ?></h4>
        <div class="flex flex-a"><?php
            if($annonces['ann_fumeur'] == 1){
                echo '<p class="flex flex-a pad-15px"><i class="material-icons pad-right-20px">smoke_rooms</i> Fumeur autorisé </p> ';
            } else {
                echo '<p class="flex flex-a pad-15px"><i class="material-icons  pad-right-20px">smoke_free</i> Non fumeur </p> ';
            }
            if ($annonces['ann_animal'] == 1){
                echo '<p class="flex flex-a pad-15px"><i class="material-icons  pad-right-20px">pets</i> Animal de compagnie autorisé </p> ';
            }else {
                echo '<p class="flex flex-a pad-15px">Pas d\'animal de compagnie autorisé </p> ';
            }
            if ($annonces['ann_ascenseur'] == 1){
                echo '<p class="flex flex-a pad-15px"></p><i class="material-icons pad-right-20px">import_export</i> Ascenseur disponible </p> ';
            }else {
                echo '<p class="flex flex-a pad-15px">Pas d\'ascenseur </p> ';
            }
            ?>
        </div>

        <h6>Resumé</h6>
        <p><?= $annonces['ann_description'] ?></p>

        <h6>Détails</h6>
        <div class="row">
            <div class="col s6">
                    <?php
                    if($annonces['ann_alarme'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">alarm_on</i>
                        <p>Alarme</p>
                        </div>';

                    }
                    if ($annonces['ann_tele'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">tv</i>
                        <p>Télé</p>
                        </div>';
                    }
                    if($annonces['ann_internet'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">wifi</i>
                        <p>Internet Haut Débit</p>
                        </div>';
                    }
                    if($annonces['ann_animal'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">pets</i>
                        <p>Animal de compagnie</p>
                        </div>';
                    }
                    if($annonces['ann_cuisine'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">kitchen</i>
                        <p>Cuisine équipée</p>
                        </div>';
                    }
                    if($annonces['ann_metro'] == 1){
                        echo '
                        <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">tram</i>
                        <p>Métro à proximité</p>
                        </div>';
                    }
                    ?>
            </div>
            <div class="flex flex-a">
                <i class="material-icons marg-right-20px">wc</i>
                <p><?= $annonces['ann_wc'] ?> WC</p>
            </div>
            <div class="flex flex-a">
                <i class="material-icons marg-right-20px">hotel</i>
                <p><?php
                    if($annonces['ann_chambre_dispo'] =='1'){
                        echo $annonces['ann_chambre_dispo'] . ' chambre disponible';
                    } else {
                        echo $annonces['ann_chambre_dispo'] . ' chambres disponibles';
                    }
                ?></p>
            </div>
            <div class="flex flex-a">
                <i class="material-icons marg-right-20px">hot_tub</i>
                <p><?php
                    if($annonces['ann_sdb'] =='1'){
                        echo $annonces['ann_sdb'] . ' salle de bain';
                    } else {
                        echo $annonces['ann_sdb'] . ' salles de bains';
                    }
                    ?></p>
            </div>
        </div>
        </div>
    </div>

    <div class="col s12 m12 l4 flex flex-c-c width-100 grey lighten-4">
        <div class="row  marg-top-5">
            <div class="col 12 m12 l12">
                <div class=>
                    <div class="flex flex-col flex-a center">
                        <div id="avatar" class=" light-blue darken-3 flex flex-c-c">
                            <img src="images/<?php if($annonces['clients_sexe'] == 'femme'){echo 'avatar.png';} else{echo 'man.png';}?>">
                        </div>
                        <div class="pad-top-30px">
                            <h4><?= $annonces['clients_prenom']?> <?= $annonces['clients_nom'] ?> </h4>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-a marg-right-20px">
                            <i class="material-icons marg-right-20px">person</i>
                            <p><?= $annonces['clients_sexe'] ?></p>
                        </div>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">cake</i>
                            <p><?= $annonces['clients_age'] ?></p>
                        </div>
                    </div>
                    <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">location_city</i>
                        <p><?= $annonces['clients_adresse'] ?> <?= $annonces['clients_cp'] ?> <?= $annonces['clients_ville'] ?></p>
                    </div>
                    <div class="flex flex-a">
                        <i class="material-icons marg-right-20px"><?php if($annonces['clients_coloc'] == 'colocation'){echo 'home';} else{echo 'group';}?></i>
                        <p>Cherche <?= $annonces['clients_coloc'];?></p>
                    </div>
                    <div class="flex flex-a">
                        <i class="material-icons marg-right-20px">warning</i>
                        <p>Quelques spécificités :</p><br>
                    </div>
                    <div class="flex flex-a">


                    </div>

                    <div class="flex flex-c-c contact marg-top-20px">
                        <a href="mailto:<?= $annonces['clients_email'] ?>" ><i class="material-icons black-text marg-right-40px">mail</i></a>

                        <a href="tel:<?= $annonces['clients_phone'] ?>"><i class="material-icons black-text">phone</i></a>

                    </div>
                </div>

            </div>

        </div>


    </div>

</main>

<?php
require_once('includes/bas.inc.php')
?>
<script type="text/javascript">
    $('.carousel.carousel-slider').carousel({fullWidth: true});
</script>