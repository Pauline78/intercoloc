<?php
require_once ('includes/init.inc.php');
require_once ('includes/nav_front.php');
$title = 'Espace de connexion';
$msg = "";  // pour eviter les undefined variable

if(isset($_POST['connexion'])) {

    $res_user = $pdo->prepare("SELECT * FROM clients WHERE clients_email = :email AND clients_password = :password");
    $res_user->bindParam(':email', $_POST['clients_email']);
    $res_user->bindParam(':password', $_POST['clients_password']);
    $res_user->execute();
    $res_user = $res_user->fetch(PDO::FETCH_ASSOC);

    $res_admin = $pdo->prepare("SELECT * FROM administrateur WHERE admin_user = :login AND admin_mp = :password");
    $res_admin->bindValue(':login', $_POST['clients_email']);
    $res_admin->bindValue(':password', $_POST['clients_password']);
    $res_admin->execute();
    $res_admin = $res_admin->fetch(PDO::FETCH_ASSOC);

    if ($res_user['id_clients']) {
        session_start();
        $_SESSION['user'] = $res_user;
        header('location:index-co.php');
    }
    else if($res_admin['id_administrateur']) {
        session_start();
        $_SESSION['admin'] = $res_admin;
        header('location:index-co.php');
    }
    else
        $msg = "<center><p class=\"red-text\">Mauvais identifiant ou mot de passe</p></center>";

}
require_once ('includes/haut.inc.php');
?>
<main style="padding-top: 100px;">

    <h2 class="center-align"><?= $title ?></h2>
    <?= $msg ?>
    <form class="col s12 m12 l4" method="post" action="">

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='text' name='clients_email' id='email' placeholder="Email"/>
                <label class="active" for='email'>Email</label>
            </div>
        </div>

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='password' name='clients_password' id='password' />
                <label class="active" for='password'>Mot de passe</label>
            </div>
        </div>

        <div class='row'>
            <button type='submit' name='connexion' class='col s12 m12 l2 offset-l5 btn btn-large waves-effect orange darken-4'>Connexion</button>
        </div>
    </form>

</main>

<?php
require_once ('includes/bas.inc.php');
require_once ('includes/footer_front.php');