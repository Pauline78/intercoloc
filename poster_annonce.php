<?php
/**
 * Created by PhpStorm.
 * User: paulineferaut
 * Date: 12/02/2018
 * Time: 15:30
 */

require_once('includes/init.inc.php');
$title = 'Poster une annonce';

if(isset($_GET['suivant']) && is_numeric($_GET['suivant']))
{
    $getClient = $pdo->prepare('SELECT * FROM clients WHERE id_clients = :id');
    $getClient->bindValue(':id', $_GET['suivant'], PDO::PARAM_INT);
    $getClient->execute();
    $resultat = $getClient->fetch(PDO::FETCH_ASSOC);
}


require_once('includes/haut.inc.php');

require_once('includes/nav_co.php');
?>

<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s6">
                <input id="title" type="text" class="validate">
                <label for="title">Titre de l'annonce</label>
            </div>
            <div class="input-field col s6">
                <input id="price" type="text" class="validate">
                <label for="price">Quel est le prix du loyer par mois ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="colocataire" type="text" class="validate">
                <label for="colocataire">Quel type de colocataire recherchez-vous ?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="descrition" type="text" class="validate">
                <label for="description">Descrition de l'annonce</label>
            </div>
        </div>

    </form>
</div>


<?php
require_once ('includes/footer-co.inc.php');
require_once ('includes/bas.inc.php');

?>
<script  type="text/javascript">
    $(document).ready(function() {
        Materialize.updateTextFields();
    });

</script>
