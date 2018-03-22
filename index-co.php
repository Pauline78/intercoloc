<?php
require_once('includes/init.inc.php');
$title = 'Inter\'Coloc';


/* Affichage des clients */
$query =$pdo->query ("SELECT id_clients, clients_sexe, clients_prenom, clients_nom, clients_age, clients_adresse, clients_cp, clients_ville, clients_phone, clients_situation, clients_coloc, DATE_FORMAT(created_at, '%d/%m/%Y - %H:%i') AS created_at, DATE_FORMAT(updated_at, '%d/%m/%Y - %H:%i') AS updated_at FROM clients LIMIT 3");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

/* Affichage des annonces */
$query =$pdo->query ("SELECT * FROM annonce, clients WHERE clients.id_clients = annonce.id_clients LIMIT 2");
$annonces = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($_SESSION['admin'];
/*
   Le var_dump($_SESSION['admin']; récupère quelque chose de NULL mais je ne sais pas pourquoi pourtant il reconnait que ce n'est pas une session user
 */

require_once('includes/haut.inc.php');


require_once('includes/nav_co.php');
?>
<div id="triangle-code"></div>
<main>
    <section class="height-40vh marg-top-5">

        <div class="row">
            <div class="col s12 m12 l8 ">
                <?php
                
                    if(isset($_SESSION['user']['clients_prenom']))
                        echo "<h1>Bienvenue " . $_SESSION['user']['clients_prenom'] . " !</h1>";
                    else
                        echo "<h1>Bienvenue " . $_SESSION['admin']['admin_user'] . " !</h1>";

                    ?>
                <h3 class="marg-bot-5">Lancez dès à présent votre recherche pour trouver votre colocation idéale</h3>
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

            </div>

        </div>

    </section>

    <section class="row">
        <div class="col s12 m12 l10">
            <h2>Les annonces du moment !</h2>
        </div>

            <div class="col s12 m12 l12 no-marg">
                <?php foreach($annonces as $key => $value) :?>
                <div class="col s12 m12 l4 height-30">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/annonce/<?= $value['ann_photo'] ?>" style="height: 380px;">
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
                                    echo '<i class="material-icons">smoke_rooms</i>';
                                } else {
                                    echo '<i class="material-icons">smoke_free</i>';
                                }
                                if ($value['ann_animal'] == 1){
                                    echo '<i class="material-icons">pets</i>';
                                }
                                if ($value['ann_ascenseur'] == 1){
                                    echo '<i class="material-icons">import_export</i>';
                                }
                                ?>
                            </p>
                            <p style="font-size: 0.8rem; padding-top: 5%;">Publié par <?= $value['clients_prenom'] ?> il y a 2 jour(s)</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    </section>

    <section class="row">
        <div class="col s12 m12 l10">
            <h2>Derniers profils consultés</h2>
        </div>


        <div class="col s12 m12 l12">
            <?php
            foreach($utilisateurs as $key => $value) :
                ?>
            <div class="col s12 m12 l3 flex flex-c-c">
                <div class="row  marg-top-5 card grey lighten-4 pad-20px">
                    <div class="col 12 m12 l12">
                        <div class="flex flex-col flex-a center">

                                <div id="avatar" class="light-blue darken-3 flex flex-c-c">
                                    <img src="images/<?php if($value['clients_sexe'] == 'femme'){echo 'avatar.png';} else{echo 'man.png';}?>">
                                </div>


                            <div class="pad-top-30px">
                                <h4><?= $value['clients_prenom'] ?> <?= $value['clients_nom'] ?></h4>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-a marg-right-20px">
                                <i class="material-icons marg-right-20px">person</i>
                                <h5><?= $value['clients_sexe'] ?> </h5>
                            </div>
                            <div class="flex flex-a">
                                <i class="material-icons marg-right-20px">cake</i>
                                <h5><?= $value['clients_age'] ?> </h5>
                            </div>
                        </div>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">location_city</i>
                            <h5><?= $value['clients_adresse'] ?> <br><?= $value['clients_cp'] ?> <?= $value['clients_ville'] ?>  </h5>
                        </div>

                    </div>

                </div>
            </div>
                <?php
            endforeach;
            ?>
        </div>


    </section>





</main>

<?php
require_once ('includes/footer_front.php');
require_once ('includes/bas.inc.php');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });

    $(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });

    $('#modal1').modal('open');

    $('#modal1').modal('close');
</script>
