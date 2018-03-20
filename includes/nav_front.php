<nav class="white nav-co nav-fixed">
    <div class="nav-wrapper row flex flex-a">
        <a href="index.php" class="brand-logo row"><img class="width-30" src="images/logo.png" alt="logo"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down col s6">
            <li><a href="#valeurs" class="js-scrollTo" id="vers-valeur">Valeurs</a></li>
            <li><a href="#fonctionnement" class="js-scrollTo" id="vers-fonction">Fonctionnement</a></li>
            <li><a href="#certifications" class="js-scrollTo" id="vers-certif">Certifications</a></li>
            <li><a href="#temoignages" class="js-scrollTo" id="vers-temoignage">Témoignages</a></li>
            <li class="btn waves-light waves-effect blue darken-3 marg-top-2"><a href="connexion.php">Se connecter</a></li>
        </ul>
    </div>
</nav>


<script>

    if (location.url = ("connexion.php")) {
        document.getElementById('vers-valeur').href = "index.php#valeurs";
        document.getElementById('vers-fonction').href = "index.php#fonctionnement";
        document.getElementById('vers-certif').href = "index.php#certifications";
        document.getElementById('vers-temoignage').href = "index.php#temoignages";
    }

</script>