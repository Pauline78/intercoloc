<?php
require_once('includes/init.inc.php');
$title = 'Inter\'Coloc';

if(isset($_POST['connexion'])) {

    $resultat = $pdo->prepare("SELECT * FROM clients WHERE clients_email = :email AND clients_password = :password");

    $resultat->bindValue(':email', $_POST['email']);
    $resultat->bindValue(':password', $_POST['password']);
    $resultat->execute();

    $resultats = $resultat->fetch(PDO::FETCH_ASSOC);

    if(isset($resultats)) {
        if($resultats['clients_email'] == 'administrateur@gmail.com' && $resultats['clients_password'] == 'admin'){
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
require_once('includes/haut.inc.php');
require_once('includes/nav_front.php');

?>

<header>
    <div id="header-img"></div>
    <div class="text-header absolute flex flex-col flex-c-c center-align width-100">
        <h1>Trouvez la colocation parfaite, trouvez votre Inter'Coloc !</h1>
        <h3>La plateforme qui vous accompagne dans votre recherche de colocation </br>quelque soit votre âge.</h3>
        <div class="marg-top-5">
            <span id="suscribe-home" class="btn-orange">S'inscrire</span>
        </div>
        <div id="scroll-down">
            <h3>Pour en savoir plus, cliquez juste en-dessous !</h3>
            <div class="flex width-100 flex-c-c">
                <a class="round height-30px width-30px flex flex-c-c" href="#valeurs">
                    <i class="material-icons">keyboard_arrow_down</i>
                </a>
            </div>
        </div>
    </div>
</header>

<?php require_once ("includes/inscription.inc.php"); ?>

<main id="main-index">
    <section id="valeurs" class="height-70vh flex flex-col flex-c-c pad-right-left-5">
        <div class="center-align">
            <h2>Nos valeurs</h2>
            <p>Elles nous définissent, décrivent qui nous sommes et qui nous voulons être à</br>travers notre offre.
                Alors participez à notre projet pour en profiter !</p>
        </div>
        <div class="flex flex-s-a width-100 pad-top-30px row">
            <div class="col s12 m3 center-align div-icons flex flex-col flex-c-c">
                <div class="rond-valeur rond-orange flex flex-c-c">
                    <img class="width-60" src="images/share-icon.png" alt="pshiit_partage" title="Pshiit Partage">
                </div>
                <h4><strong>Partage</strong></h4>
                <p>Une colocation basée sur la <strong>transmission</strong> de valeurs, de vécu,
                    d'expérience.</p>
            </div>
            <div class="col s12 m3 center-align div-icons flex flex-col flex-c-c">
                <div class="rond-valeur rond-bleu flex flex-c-c">
                    <img class="width-40" src="images/entraide.png" alt="euro_entraide" title="Euro Entraide">
                </div>
                <h4>Entraide</h4>
                <p>Nous proposons un  <strong>soutient</strong> ainsi qu'un respect mutuel entre, les
                    générations.</p>
            </div>
            <div class="col s12 m3 center-align div-icons flex flex-col flex-c-c">
                <div class="rond-valeur rond-orange flex flex-c-c">
                    <img class="width-40" src="images/confiance.png" alt="canap_confiance" title="Canap Confiance">
                </div>
                <h4>Confiance</h4>
                <p>Un site sécurisé et des offres <strong>fiables </strong>pour vous assurer une colocation
                    saine.</p>
            </div>
            <div class="col s12 m3 center-align div-icons flex flex-col flex-c-c">
                <div class="rond-valeur rond-bleu flex flex-c-c">
                    <img class="width-40" src="images/home.png" alt="home_accompagnement" title="Home Accompagnement">
                </div>
                <h4>Accompagnement</h4>
                <p>Un suivi permanent de vos attentes et une <strong>présence</strong> quotidienne pour
                    vous</p>
            </div>
        </div>
    </section>

    <!--<section id="fonctionnement" class="background-gris height-80vh flex flex-col flex-c-c">
        <h2 class="center-align marg-bot-5">Comment ça marche ?</h2>
        <div class="flex flex-c-c">
            <div class="flex-col l6 center-align">
                <img class="width-60" src="images/back_accueil.jpg" alt="cmt_ca_marche" title="Comment ca marche">
            </div>
            <div class="flex-col l6">

                <p class="flex flex-a">Inscription<i class="material-icons pad-left-20 pad-right-20">arrow_forward</i>
                    On veut en savoir plus !</p>
                <p class="flex flex-a">Formulaire <i class="material-icons pad-left-20 pad-right-20">arrow_forward</i>
                    Des questions qui permettent d'affiner votre profil.</p>
                <p class="flex flex-a">Résultat <i class="material-icons pad-left-20 pad-right-20">arrow_forward</i>
                    Notre programme vous proposeras divers profils <br>correspondant à vos caractéristiques</p>
                <p class="flex flex-a">Evaluation <i class="material-icons pad-left-20 pad-right-20">arrow_forward</i>
                    Afin de garantir la meilleure colocation possible <br>donnez votreavis en ligne après vos rencontres
                </p>
                <p class="flex flex-a">Recherche <i class="material-icons pad-left-20 pad-right-20">arrow_forward</i>
                    Vient enfin le moment da passer à la colocation avec<br> la personne de votre choix</p>
                <div class="marg-top-5"><a class="btn-orange" href="inscription_clients.php">S'inscrire</a></div>

            </div>

        </div>
    </section>-->

    <section id="fonctionnement" class="background-gris height-80vh flex flex-col flex-c-c">
        <h2 class="center-align marg-bot-5 marg-top-2">Inter'Coloc, qu'est-ce que c'est ?</h2>
        <div class="flex flex-c-c row">
            <div class="flex-col col l6 center-align">
                <img class="width-80" src="images/paris_home.jpg" alt="cmt_ca_marche" title="Comment ca marche">
            </div>
            <div class="flex-col col l6">
                <div>
                    <p>Inter’Coloc lutte contre la <strong>solitude</strong> et les <strong>prix élevés du logement</strong> français.</p>
                    <p> Nous avons pour projet de <strong>réunir des personnes de tous âges ayant des passions communes lors de  colocations intergénérationnelle</strong>.</p>
                    <p>Lors de l’inscription, l’utilisateur devra remplir un formulaire constitué de diverses questions.</p>
                    <p>En fonction du profil établie, l’utilisateur se verra proposer diverses personnes ayant eu des résultats similaires.</p>
                    <p>Et ce, dans le but de réunir des personnes pouvant s’entendre pour ne faire perdre de temps aux utilisateurs à la recherche rapide d’un contact serieux.</p>
                    <p>Un étudiant se verra donc proposé divers retraité au profil similaire disposant d’un logement trop grand pour lui, alors qu’un retraité verra quand lui des actifs à la recherche de logement.</p>
                    <p>Suite à cela, les deux se rencontreront, puis, pourront poursuivre leurs projet vers une colocation si tout va bien.</p>
                </div>
                <div class="marg-top-5">
                    <span id="suscribe-comment" class="btn-orange">S'inscrire</span>
                </div>
            </div>
        </div>
    </section>


    <section id="certifications" class="row">
        <h3 class="center-align pad-50px">Ils nous soutiennent !</h3>
        <div class="row">
            <div class="col s12 m4">
                <div class="card-panel teal flex flex-col flex-c-c height-30vh">
                    <img class="width-50" src="images/marie-paris.png" alt="logo_mairie_paris"
                         title="Logo de la mairie de Paris">
          <span class="white-text marg-top-5 center">Soutient Inter'Coloc dans son projet d'entraide et d'échange entre
                les générations.</span>
                </div>
            </div>


            <div class="col s12 m4">
                <div class="card-panel teal flex flex-col flex-c-c height-30vh">
                    <img class="width-50" src="images/aviva.png" alt="logo_aviva_assurances" title="Logo de Aviva Assurances">
          <span class="white-text marg-top-5 center">Assure le bon déroulement de la vie en colocation en vous
                couvrant du moindre soucis. </span>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card-panel teal flex flex-col flex-c-c height-30vh">
                    <img class="width-50 center" src="images/logo-caisse-epargne.png" alt="logo_caisse_epargne"
                         title="Logo de la Caisse d'Epargne"><br>
          <span class="white-text marg-top-5 center">Propose un suivi optimal ainsi qu'une sécurité sans faille pour
                toutes vos transactions.</span>
                </div>
            </div>
        </div>

    </section>

    <section id="temoignages" class="flex-col flex-c-c height-60vh marg-bot-2">
        <h2 class="center-align">Témoignages</h2>
        <p class="center-align">Parce que votre avis nous interesse</p>
        <div class="carousel carousel-slider center" data-indicators="true">
            <div class="carousel-item flex-col flex-c-c pad-top-30px" href="#one!">
                <div class=" flex-col">
                    <img class="round" src="images/homme_vieux_temoignage.jpeg" alt="" title="">
                        <p>Retraité veuf à petite retraite; j’étais soucieux de me voir vieillir. Possédant un modeste logement, <br>j’ai pu permettre à un étudiant de se loger tout en m’aidant dans les tâches quotidiennes.</p>
                        <hr class="width-10">
                        <p>Gérard LEDUQUE | 68 ans </p>

                </div>
            </div>
            <div class="carousel-item flex-col flex-c-c pad-top-30px" href="#two!">
                <div class="flex-col">
                    <img class="round" src="images/femme_agee_temoignage.jpg" alt="" title="">
                    <p>Veuve depuis peu de temps, je ne supportais pas la solitude. J’ai donc recueilli un jeune actif<br> qui cherchait un logement pas trop cher. Inter’Coloc m’a aidé dans cette démarche et j’en suis ravie.</p>
                    <hr class="width-10">
                    <p>Paule TROGOI | 72 ans</p>
                </div>
            </div>
            <div class="carousel-item flex-col flex-c-c pad-top-30px" href="#three!">
                <div class="flex-col">
                    <img class="round" src="images/etudiant_temoignage.jpeg" alt="" title="">
                    <p>Etudiant à petit budget, je ne trouvais pas de logement proche de mon école. Grâce à <br>Inter’Coloc j’ai pu rencontrer quelqu’un qui ressemblais et qui habitait proche de mon université</p>
                    <hr class="width-10">
                    <p>Benjamin SMAND | 19 ans</p>
                </div>
            </div>
        </div>
    </section>

    <div id="modal1" class="modal">
        <div class="modal-content flex-col flex-c-c width-100 height-100">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat right"><i class="material-icons">close</i></a>
            <h3 class="center-align">Connexion</h3>

            <form class=" " method="post" action="">

                <div class='row'>
                    <div class='input-field col s12 m12 l8 offset-l2'>
                        <input class='validate' type='text' name='email' id='email' placeholder="Email"/>
                        <label class="active" for='email'>Email</label>
                    </div>
                </div>

                <div class='row'>
                    <div class='input-field col s12 m12 l8 offset-l2'>
                        <input class='validate' type='password' name='password' id='password' />
                        <label class="active" for='password'>Mot de passe</label>
                    </div>
                </div>

                <div class='row'>
                    <button type='submit' name='connexion' class='col s12 m12 l2 offset-l5 btn btn-large waves-effect orange darken-4 border-radius-10'>Connexion</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php
require_once ('includes/footer_front.php');

require_once('includes/bas.inc.php');
?>
<script type="text/javascript">

    // carousel materialize témoignages

    $('.carousel.carousel-slider').carousel({fullWidth: true});

    $(document).ready(function(){
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
    });

    $('#modal1').modal('open');

    $('#modal1').modal('close');

</script>

<script>

    // scroll liens

    $(document).ready(function() {
        $('.js-scrollTo').on('click', function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var speed = 750; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
            return false;
        });
    });

</script>