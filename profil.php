<?php
require_once('includes/init.inc.php');
$title = 'Profil';
require_once('includes/haut.inc.php');
require_once('includes/nav_co.php');

?>

<main class="row">
    <div class="col s12 m12 offset-l1 l10 flex flex-c-c marg-top-5 card border-radius-10 pad-bot-20px">
            <div class="col 12 m12 l12 marg-top-2">
                <div>
                    <div class="flex flex-col flex-a center">
                        <div id="avatar" class=" light-blue darken-3 flex flex-c-c">
                            <img src="images/avatar.png">
                        </div>
                        <div class="pad-top-30px">
                            <h3>Raphaela AGUS-AZOUBEl</h3>
                        </div>
                        <div class="flex flex-a">
                            <i class="material-icons marg-right-20px">location_city</i>
                            <p>Rue Tiquetone, 75001 Paris</p>
                        </div>
                        <div class="flex">
                            <div class="flex flex-a marg-right-20px">
                                <i class="material-icons marg-right-20px">person</i>
                                <p>Femme</p>
                            </div>
                            <div class="flex flex-a">
                                <i class="material-icons marg-right-20px">cake</i>
                                <p>25 ans</p>
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
                            <p>Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles et obscuros.</p>
                        </div>

                        <hr class="width-40">

                        <div  class="col s12 m12 l6 flex-col no-marg marg-bot-2">
                            <h3 class="orange-text">Colocation disponible</h3>
                            <p>Chambre - Salle de bain - mercede accepta lucris quosdam</p>
                            <div>
                                <img class="width-60" src="images/annonce/photo2.jpg">
                            </div>
                        </div>

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
