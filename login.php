<?php session_start();
require_once ('includes/init.inc.php');

// on verifie que l'utilisateur a bien clique sur l'envoie de la requete.
if (isset($_POST['submit'])) {
    // on verifie que les champs sont bien tous remplies.
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        // on crée des variables contenant les données ecrite par l'utilisateur.
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['password']);
        //  propriete de la requete email et mot de passe.
        $sql = "SELECT clients_email ,clients_password FROM clients WHERE email = ?";
        // on prepare la requete.
        $query = $pdo->prepare($sql);
        // on execute la requete.
        $query->execute(array($email));
        $data = $query->fetch();
        //on verifie que le hash de la base de donnée correspond au mots de passe entré par l'utilisateur .
        if (password_verify($motdepasse, $data['password'])) {
            // on met les identifiant de l'utilsateur dans une session.
            $_SESSION['id'] = $data['id'];
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            header('location:../article/liste_actualite.php');
        } else {
            header('location:login.php?error=mauvais mot de passe');
        }
    } else {
        header('location:login.php?error=Veuillez remplir tous les champs');
    }
} else {
    header('location:login.php?error=Formulaire non envoyé');
}


?>