<?php

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
        var_dump($insert);
    } else {
        $msg = '<p class="alert alert-danger">Il faut au moins une lettre pour les 2 champs</p>';
    }
}

 ?>
<section id="inscription" class="nav-fixed flex flex-c-c height-90vh width-100 background-gris">
    <div id="inscription-text" class="height-60vh flex flex-c-c flex-col">

        <h2>Comment ça marche</h2>
        <!-- INSCRIPTION -->

        <div class="width-100 height-80px flex flex-c-c">
            <!-- <img src="images/nombre1.png" alt="" title=""> -->

            <p class="width-15 height-100 flex flex-a">Inscription</p>

            <p class="width-10 height-100 flex flex-a"><i class="material-icons">arrow_forward</i></p>

            <p class="width-70 height-100 flex flex-a">On veut en savoir plus sur vous !</p>

        </div>

        <!-- FORMULAIRE -->
        <div class="width-100 height-80px flex flex-c-c">

            <p class="width-15 height-100 flex flex-a">Formulaire</p>

            <p class="width-10 height-100 flex flex-a"><i class="material-icons">arrow_forward</i></p>

            <p class="width-70 height-100 flex flex-a">Des questions permettant la meilleur correspondance en déterminant votre profil</p>

        </div>

        <!-- RESULTAT -->
        <div class="width-100 height-80px flex flex-c-c">

            <p class="width-15 height-100 flex flex-a">Résultat</p>

            <p class="width-10 height-100 flex flex-a"><i class="material-icons">arrow_forward</i></p>

            <p class="width-70 height-100 flex flex-a">Notre programme vous proposeras divers profils correspondant à vos caractéristiques</p>

        </div>

        <!-- EVALUATION -->
        <div class="width-100 height-80px flex flex-c-c">

            <p class="width-15 height-100 flex flex-a">Evaluation</p>

            <p class="width-10 height-100 flex flex-a"><i class="material-icons">arrow_forward</i></p>

            <p class="width-70 height-100 flex flex-a">Afin de garantir la meilleur colocation, donnez votre avis en ligne après vos rencontres.</p>

        </div>

        <!-- RECHERCHE -->
        <div class="width-100 height-80px flex flex-c-c">

            <p class="width-15 height-100 flex flex-a">Recherche</p>

            <p class="width-10 height-100 flex flex-a"><i class="material-icons">arrow_forward</i></p>

            <p class="width-70 height-100 flex flex-a">Vient le moment de trouver la colocation idéal</p>

        </div>

    </div>


    <div id="inscription-form" class="height-100 flex flex-c-c width-40">

        <div id="inscription-zone-form" class="width-80 height-70 marg-top-2">

            <h3 class="flex flex-c-c width-100 height-80px">Inscription</h3>

            <!-- INSCRIPTION MENU -->
            <div id="inscription-zone-form-bouton" class="width-100 flex flex-c-c flex-col">

                <p class="inscription-zone-form-reseau height-15 width-80 flex flex-c-c">Inscription avec Facebook</p>

                <p class="inscription-zone-form-reseau height-15 width-80 flex flex-c-c">Inscription avec Google</p>

                <p>ou</p>

                <p class="inscription-zone-form-reseau height-15 width-80 flex flex-c-c" id="reseau-mail">Inscription par e-mail</p>

                <p>Vous avez un compte ? <a href="">Connectez-vous !</a></p>

            </div>

            <!-- INSCRIPTION E-MAIL -->

            <div class="flex flex-c-c width-100 height-85">

                <form id="inscription-zone-form-email" method="POST" class="height-90 width-100 flex-col flex-a flex-s-a pad-top-2" action="<?= (!empty($resultat)) ? 'formulaire.php' : 'formulaire.php' ?>">

                    <input class="inscription-zone-form-email-champ" type="email" name="email" placeholder="Adresse e-mail" value="<?= (!empty($resultat)) ? $resultat['email'] : '' ?>">

                    <input class="inscription-zone-form-email-champ" type="password" name="password" placeholder="Mot de passe" value="<?= (!empty($resultat)) ? $resultat['password'] : '' ?>">

                    <input class="inscription-zone-form-email-champ" type="text" name="prenom" placeholder="Prénom" value="<?= (!empty($resultat)) ? $resultat['prenom'] : '' ?>">

                    <input class="inscription-zone-form-email-champ" type="text" name="nom" placeholder="Nom" value="<?= (!empty($resultat)) ? $resultat['nom'] : '' ?>">


                    <span id="sexe" class="flex left">
                        <span class="pad-right-40px">Sexe :</span>
                            <input type="checkbox"  id="filled-in-box" value="homme" name="sexe"/>
                            <label for="filled-in-box" class="pad-right-20px">Homme</label>

                            <input type="checkbox" id="filled-in-box2" value="femme" name="sexe"/>
                            <label for="filled-in-box2">Femme</label>


					</span>

                    <span id="naissance" class=" marg-bot-2">Date de naissance :</span>

                    <input type="date" name="age" class="inscription-zone-form-email-champ marg-bot-2" value="<?= (!empty($resultat)) ? $resultat['age'] : '' ?>">



                    <span class="marg-top-2 marg-bot-2">
						<input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
						<label for="newsletter">M'inscrire à la newsletter ?</label>
					</span>

                    <span class="flex flex-a flex-s-a width-60">
						<span class="span-email" id="retour-menu">Retour</span>

                        <button class="btn-orange span-email" name="suivant" type="submit" value="1">Suivant</button>
					</span>

                    <p>Vous avez un compte ? <a href="">Connectez-vous !</a></p>

                </form>

            </div>

        </div>

    </div>

</section>