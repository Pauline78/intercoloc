<?php
require_once ('includes/init.inc.php');
$title = 'Espace de connexion';

if(isset($_POST['connexion'])) {

    $resultat = $pdo->prepare("SELECT * FROM clients WHERE clients_email = :email AND clients_password = :password");

    $resultat->bindValue(':email', $_POST['clients_email']);
    $resultat->bindValue(':password', $_POST['clients_password']);
    $resultat->execute();

    $resultats = $resultat->fetch(PDO::FETCH_ASSOC);


    if($resultats) {
        session_start();

        if($resultats['clients_email'] == 'administrateur@gmail.com' && $resultats['password'] == 'admin'){
            $_SESSION['admin'] = $resultats;
        }else{
            $_SESSION['user'] = $resultats;
        }


        header('location:index-co.php');
    }
    else {
        $msg= '<p class="red-text">Mauvais identifiant ou mot de passe</p>';
    }


}
require_once ('includes/haut.inc.php');
?>
<main>

    <h2 class="center-align"><?= $title ?></h2>
    <form class="col s12 m12 l4" method="post" action="">

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='text' name='email' id='email' placeholder="Email"/>
                <label class="active" for='email'>Email</label>
            </div>
        </div>

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='password' name='password' id='password' />
                <label class="active" for='password'>Mot de passe</label>
            </div>
        </div>

        <div class='row'>
            <button type='submit' name='connexion' class='col s12 m12 l2 offset-l5 btn btn-large waves-effect indigo'>Connexion</button>
        </div>
    </form>

</main>