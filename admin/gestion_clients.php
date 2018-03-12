<?php
require_once('../includes/init.inc.php');
$title = 'Gestion des clients';


/* Suppression des clients */

if(isset($_GET['delete']) && is_numeric($_GET['delete']))
{
    $delete = $pdo->prepare("DELETE FROM clients WHERE id_clients = :id");
    $delete->bindValue(':id', $_GET['delete'], PDO::PARAM_INT);
    $delete->execute();

    if($delete)
    {
        $confirmation = '<h3>Client supprimé</h3>';
    }
    else
    {
        $confirmation = '<h3 class="center red-text">Problème survenu dans la suppression du client, veuillez réessayer !</h3>';
    }
}
$j = 0;
$date = [];
/* Affichage des clients */
$query =$pdo->query ("SELECT id_clients, clients_sexe, clients_prenom, clients_nom, clients_age, clients_adresse, clients_cp, clients_ville, clients_phone, clients_situation, clients_coloc, DATE_FORMAT(created_at, '%d/%m/%Y - %H:%i') AS created_at, DATE_FORMAT(updated_at, '%d/%m/%Y - %H:%i') AS updated_at FROM clients");
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($utilisateurs as $utilisateur) {
    $date[$j] =  date("j F Y", strtotime($utilisateur['clients_age']));
    $j++;
}

require_once('includes_admin/haut_admin.inc.php');
require_once('includes_admin/nav_back.php');

?>

<h2 class="center-align"><?= $title ?></h2>

<?php
$i = 0;
    foreach($utilisateurs as $key => $value) :
?>

<div class="row">
    <div class="col s12 m4">
        <div class="card light-blue darken-4">
            <div class="card-content white-text">
                <span class="card-title"><?= $value['clients_prenom'] ?> <?= $value['clients_nom'] ?></span>
                <p>Sexe : <?= $value['clients_sexe'] ?></p>
                <p>Age : <?= $date[$i] ?></p>
                <p>Adresse : <?= $value['clients_adresse'] ?>  <?= $value['clients_cp'] ?>  <?= $value['clients_ville'] ?></p>
                <p>Téléphone : <?= $value['clients_phone'] ?></p>
                <p>Situation : <?= $value['clients_situation'] ?></p>
                <p>Cherche un(e): <?= $value['clients_coloc'] ?></p>

            </div>

            <div class="card-action">
                <a href="modification_clients.php?modification=<?= $value["id_clients"]; ?>"><i class="material-icons">edit</i></a>
                <a href="gestion_clients.php?delete=<?= $value["id_clients"]; ?>" class="supprimer" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce client ?')"><i class="material-icons">delete</i></a>
            </div>
        </div>
    </div>

<?php
    $i++;
    endforeach;
?>
<?php
    require_once('includes_admin/bas_admin.inc.php');
?>