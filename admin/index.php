<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:login.php");
    exit;
}
require_once('../includes/init.inc.php');
$login = false;
$title = 'Espace de connexion';

if($_POST)
{
    if(empty($_POST["user"]) || empty($_POST["mp"]))
    {
        echo "<h5 style='color:red'>Erreur : Veuillez remplir tous les champs</h5>";
    }
    else
    {
        $resultat = $pdo->query("SELECT * FROM administrateur");
        $users = $resultat->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $oneuser)
        {
            if($_POST["user"] == $oneuser['admin_user'] && $_POST["mp"] == $oneuser['admin_mp'])
            {
                $login = true;
                $_SESSION["id"] = $oneuser["id_user"];
                $_SESSION["user"] = $oneuser["admin_user"];
            }
        }

        if($login)
        {
            header('Location:gestion_clients.php');
        }
        else
        {
            echo "<h5 style='color:red'>Erreur : Informations de connexion incorrectes</h5>";
        }
    }

}

require_once('includes_admin/haut_admin.inc.php');
?>

<main>

    <h2 class="center-align"><?= $title ?></h2>
    <form class="col s12 m12 l4" method="post" action="">

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='text' name='user' id='user' />
                <label class="active" for='email'>Utilisateurs</label>
            </div>
        </div>

        <div class='row'>
            <div class='input-field col s12 m12 l4 offset-l4'>
                <input class='validate' type='password' name='mp' id='mp' />
                <label class="active" for='mp'>Mot de passe</label>
            </div>
        </div>

        <div class='row'>
            <button type='submit' name='btn_login' class='col s12 m12 l2 offset-l5 btn btn-large waves-effect indigo'>Connexion</button>
        </div>
    </form>

</main>
<script>
    $(document).ready(function() {
        Materialize.updateTextFields();
    });
</script>
<?php
    require_once('includes_admin/bas_admin.inc.php')
?>