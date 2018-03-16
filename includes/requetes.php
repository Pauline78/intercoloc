<?php

include'connexion.php';

$question = $pdo->query( 'SELECT * FROM questionnaire ORDER BY cat ASC' );
$questions = $question->fetchAll( PDO::FETCH_ASSOC );

$count_cat = $pdo->query( 'SELECT cat FROM questionnaire ORDER BY cat DESC' );
$count_cat = $count_cat->fetch( PDO::FETCH_ASSOC );


if (isset($_POST['OK'])) {

    unset($_POST['OK']);                            // on enleve la variable du bouton submit pour eviter les conflits lors du max()
    $profil = array_keys($_POST, max($_POST))[0];   // On cherche quel est le profil qui a le score le plus elevé et on recupere son numero

	// inserer le $profil (qui est sous la forme "profil_1" et qu'on doit explode)
  // $add = $pdo->query('INSERT INTO clients (`client_pf`) VALUES (' . explode('_', $profil)[1] . ');');       // WHERE `clients_email` = ' . $_POST['mail'] . ';');
}

?>