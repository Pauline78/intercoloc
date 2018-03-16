<?php

include'parameters.inc.php';

$question = $pdo->query( 'SELECT * FROM questionnaire ORDER BY cat ASC' );
$questions = $question->fetchAll( PDO::FETCH_ASSOC );

$count_cat = $pdo->query( 'SELECT cat FROM questionnaire ORDER BY cat DESC' );
$count_cat = $count_cat->fetch( PDO::FETCH_ASSOC );


if (isset($_POST['OK'])) {

    $p = $_POST;
    $profil = array_keys($_POST['profil'], max($_POST['profil']))[0];   // On cherche quel est le profil qui a le score le plus elevé et on recupere son numero

	// inserer le $profil (qui est sous la forme "profil_1" et qu'on doit explode)
    $add = $pdo->prepare('INSERT INTO clients (clients_sexe, clients_prenom, clients_nom, clients_age, clients_email, clients_password, client_newsletter,  client_pf) VALUES (:sexe, :prenom, :nom, :age, :email, :password, :newsletter, :profil);');
    $add->bindParam('sexe', $p['sexe'], PDO::PARAM_STR);
    $add->bindParam('prenom', $p['prenom'], PDO::PARAM_STR);
    $add->bindParam('nom', $p['nom'], PDO::PARAM_STR);
    $add->bindParam('age', $p['age'], PDO::PARAM_STR);
    $add->bindParam('email', $p['email'], PDO::PARAM_STR);
    $add->bindParam('password', $p['password'], PDO::PARAM_STR);
    $add->bindParam('newsletter', $p['newsletter'], PDO::PARAM_BOOL);
    $add->bindParam('profil', $profil, PDO::PARAM_INT);

    $add->execute();
    header('Location: connexion.php');
}

?>