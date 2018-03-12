<?php
require_once('../includes/init.inc.php');
$empty = null;
$champsVides = [];

foreach ($_POST as $key => $value ) {
    if(empty($_POST[$key])){
        $empty = true;
        $champsVides[] = $key; // je remplis le tableau $champsVides pour indiquer quels champs sont vides
        var_dump($_POST);
    } else {
        $_POST[$key] = trim($value); // je supprime les espaces des extremites
    }
}


if(isset($_POST['suivant']) && !empty($_POST['email'])  && !empty($_POST['nom'])){

    // je verifie si mes 2 champs contiennent au moins une lettre
    if(
        preg_match('/[a-zA-Z]/', $_POST['nom'])
        && preg_match('/[a-zA-Z]/', $_POST['prenom'])
        && preg_match('/[a-zA-Z]/', $_POST['email'])
    ){
        // 2 je prepare ma requete
        $insert = $pdo->prepare('INSERT INTO clients(clients_sexe, clients_prenom, clients_nom, clients_age, clients_email, clients_password, client_newsletter) VALUES(:sexe, :prenom, :nom, :age, :email, :password, :newsletter)');
        // 3 je lie ma variable SQL a ma variable PHP $_POST
        $insert->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
        $insert->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insert->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insert->bindValue(':age', $_POST['age'], PDO::PARAM_STR);
        $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $insert->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
        $insert->bindValue(':newsletter', $_POST['newsletter'], PDO::PARAM_BOOL);
        // 4 j'execute ma requete
        $insert->execute();
    } else {
        $msg = '<p class="alert alert-danger">Il faut au moins une lettre pour les 2 champs</p>';
    }


    // si l'insertion s'est bien passee
    if($insertion)
    {
        $confirmation = '<h3 class="center green-text">Enregistrement effectué</h3>';
    }
    else
    {
        $confirmation = '<h3 class="center green-text">Erreur d\'enregistrement</h3>';
    }


} else {
    var_dump($_POST);
}
//header('location:profil_client.php');