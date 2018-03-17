<?php
/**
 * Created by PhpStorm.
 * User: paulineferaut
 * Date: 12/02/2018
 * Time: 14:45
 */
?>

<?php
if(isset($_SESSION['user'])) {
    echo '<nav class="white nav-co">
    <div class="nav-wrapper row flex flex-a">
        <a href="index-co.php" class="brand-logo"><img class="width-40" src="images/logo.png"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down col s4">
            <li><a href="liste_annonces.php">Annonces</a></li>
            <li><a href="poster_annonce.php">Poster une annonce</a></li>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="messagerie.php">Messagerie</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </div>
</nav>';
}
else if(isset($_SESSION['admin'])) {
    echo '<nav class="white nav-co">
    <div class="nav-wrapper row flex flex-a">
        <a href="index-co.php" class="brand-logo"><img class="width-40" src="images/logo.png"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down col s4">
            <li><a href="liste_annonces.php">Annonces</a></li>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="admin/gestion_clients.php">BackOffice</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </div>
</nav>';
}

else {
    header("Location: connexion.php");
}
?>