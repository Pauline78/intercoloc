<?php
require_once('includes/init.inc.php');
$title = 'Contact';
require_once('includes/haut.inc.php');
require_once('includes/nav_co.php');

if (isset($_POST['envoyer'])){
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "From:".ucwords(strtolower($_POST['nom']))." ".ucfirst(strtolower($_POST['prenom']))." <".$_POST['email'].">";
    $destinataire = "pauline.feraut@eemi.com"; //amado.diy@gmail.com
    $sujet = ucfirst(strtolower($_POST['sujet']));
    $message = "<p>".ucfirst($_POST['message'])."</p>";

    mail($destinataire,$sujet,$message,$headers);


    $insert = $pdo->prepare("INSERT INTO mail(mail_nom, mail_prenom, mail_email, mail_sujet, mail_message) VALUES (:nom,:prenom,:email,:sujet,:message)");

    $insert->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $insert->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $insert->bindValue(':sujet', $_POST['sujet'], PDO::PARAM_STR);
    $insert->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

    $insertion = $insert->execute();

}

?>
<main>
    <section class="marg-top-2">
        <div class="row">

            <form class="col s12 m12 l6 marg-top-2" method="post">
                <div class="center-align">
                    <h1>Contact</h1>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="nom">
                        <label for="first_name">Nom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="prenom">
                        <label for="last_name">Prenom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="sujet" type="text" class="validate" name="sujet">
                        <label for="sujet">Sujet</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="message" class="materialize-textarea" name="message"></textarea>
                        <label for="messge">Message</label>
                    </div>
                </div>

                <div class="row center-align">
                    <div class="input-field col s12">
                        <input type="submit" class="btn-orange" value="Envoyer" name="envoyer">
                    </div>
                </div>
            </form>
            <div class="col s12 m12 l6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.426106648148!2d2.3392181154932623!3d48.86915300790319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3c8ab00dff%3A0xc8bb3a66d8ae2daa!2s28+Place+de+la+Bourse%2C+75002+Paris!5e0!3m2!1sfr!2sfr!4v1520586907982" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</main>


<?php
require_once ('includes/footer_front.php');
require_once ('includes/bas.inc.php');
?>
