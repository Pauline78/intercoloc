<?php
//  Récupération de l'utilisateur et de son pass hashé
// inclusion du fichier de connexion mysql PDO
require_once('includes/init.inc.php');
// requete SQL simple, un SELECT
$sql = "SELECT 'id', 'clients_email', 'clients_password' FROM 'clients' WHERE clients_email = :email";
// premiere etape, le prepare
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $_POST['email']);
$stmt->execute();
$resultat = $stmt -> fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($_POST['password'] ===  $resultat['mdp']) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['email'] = $resultat['mail'];
        $_SESSION['mdp'] = $resultat['mdp'];
        header('location:../fr/dashboard.php');
    }
    else {
        echo 'Mauvais identifiant ou mot de passe ! aaaaaaa';
    }
}