<?php

include_once ('includes/requetes.php');
require_once ('includes/init.inc.php');

$title = 'Formulaire';

// on desactive l'affichage des notices
error_reporting(0);

// variable qui contiendra tous les formulaires
$full_div = "";

// boucle pour chacun des formulaire
// tant que $c est plus petit que le nombre total de formulaire (cat)
for ($c = 1; $c <= $count_cat['cat']; $c++) {

    $q = "<div id='form-" . $c . "' class='form'>

            <h1 id='titre-formulaire'>Formulaire " . $c . "</h1>
        
            <div class='all-questions'>";

                $q_num = 0;
                // boucle pour chacune des questions
                // tant qu'il y a des questions pour ce formulaire
                for ($z = 0; isset($questions[$z]); $z++) {
                    if ($questions[$z]['cat'] == $c) {
                        $q_num++;
                        $q .= "
                            <div class='question' id='question-" . $questions[$z]['cat'] . "-" . $q_num . "'>
                            
                                <h3>" . $questions[$z]['question']. "</h3>
                                
                                <ul>";
                                    $choix = explode(';', $questions[$z]['choix']);

                                    for ($x = 0; $choix[$x]; $x++)
                                        $q .= "<li><input type='radio' name='" . $z . "'>" . $choix[$x] . "</li>";

                                    $q .= "
                                </ul>
                            </div>";
                    }
                    else
                        $q_num = 0;
                }
                $q .= '
            </div>
            
            <div class="form-send"><input type="button" name="OK" value="Suivant" id="valider" onclick="addPoint(' . $c . ')"></div>
            
        </div>';

    // ajouter les différentes questions ($q) au formulaire ($form)
    $full_div .= $q;
}

require_once ('includes/haut.inc.php');
require_once ('includes/nav_front.php');

?>

    <body>

    <form id="bloc-form" method="post">
        <!-- inserer ici l'input avec comme value, le mail de la personne -->
        <input type="hidden" id="p1" name="profil_1" value="0">
        <input type="hidden" id="p2" name="profil_2" value="0">
        <input type="hidden" id="p3" name="profil_3" value="0">
        <input type="hidden" id="p4" name="profil_4" value="0">

        <div id="formulaire">
            
            <?php echo $full_div; ?>
            
        </div>
    </form>

    </body>

<?php
require_once('includes/bas.inc.php');
?>

</html>
