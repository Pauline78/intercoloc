<?php
require_once('../includes/init.inc.php');
$empty = null;
$champsVides = [];
foreach ($_POST as $key => $value) {
    if(empty($_POST[$key])){
        $empty = true;
        $champsVides[] = $key; // je rempli le tableau $champsVides pour indiquer quels champs sont vides
    } else{
        $_POST[$key] = trim($value); // je supprime les espaces des extremites
    }
}
//on controle d'abord si les champs obligatoires ne sont pas vides, puis s'ils correspondent aux exigences demandées
if(isset($_POST['enregistrement']) && !empty($_POST['nom']) && !empty($_POST['prenom'])
){
        $modif = $pdo->prepare("UPDATE clients
              SET clients_sexe = :sexe,
              clients_prenom = :prenom,
              clients_nom = :nom,
              clients_age = :age,
              clients_email = :email,
              clients_password = :password,
              clients_adresse = :adresse,
              clients_cp = :cp,
              clients_ville = :ville,
              clients_phone = :phone,
              clients_situation = :situation,
              clients_coloc = :coloc,
              client_newsletter = :newsletter
              WHERE id_clients =".$_GET['modification']);

        $modif-> bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR );
        $modif-> bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR );
        $modif-> bindValue(':nom', $_POST['nom'], PDO::PARAM_STR );
        $modif-> bindValue(':age', $_POST['age'] );
        $modif-> bindValue(':email', $_POST['email'], PDO::PARAM_STR );
        $modif-> bindValue(':password', $_POST['password'], PDO::PARAM_STR );
        $modif-> bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR );
        $modif-> bindValue(':cp', $_POST['cp'], PDO::PARAM_INT );
        $modif-> bindValue(':ville', $_POST['ville'], PDO::PARAM_STR );
        $modif-> bindValue(':phone', $_POST['phone'], PDO::PARAM_STR );
        $modif-> bindValue(':situation', $_POST['situation'], PDO::PARAM_STR );
        $modif-> bindValue(':coloc', $_POST['coloc'], PDO::PARAM_STR );
        $modif-> bindValue(':newsletter', $_POST['newsletter'], PDO::PARAM_INT);


        $modification = $modif->execute();
        header('Location: gestion_clients.php');

}else {
    $_SESSION['error_message'][] = 'Les champs obligatoires sont vides';
}

$_SESSION['old_values'] = $_POST; // je renvoie les valeurs du $_POST


?>