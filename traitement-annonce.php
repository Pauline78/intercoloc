<?php

print_r($_POST);

require_once ('includes/init.inc.php');

if(isset($_POST['envoyer'])) {

    $ajout = $pdo->prepare('INSERT INTO annonce(
				ann_title, 
				ann_price, 
				ann_adresse, 
				ann_cp, 
				ann_ville, 
				ann_colocataire, 
				ann_description, 
				ann_situation,
				ann_chambre_dispo, 
				ann_ascenseur, 
				ann_tele, 
				ann_internet,
				ann_animal,
				ann_sdb,
				ann_fumeur,
				ann_metro,
				ann_wc,
				ann_pf,
				ann_alarme,
				ann_temps
				)
				VALUES(
				:ann_title, 
				:ann_price, 
				:ann_adresse, 
				:ann_cp, 
				:ann_ville, 
				:ann_colocataire, 
				:ann_description, 
				:ann_situation,
				:ann_chambre_dispo, 
				:ann_ascenseur, 
				:ann_tele, 
				:ann_internet,
				:ann_animal,
				:ann_sdb,
				:ann_fumeur,
				:ann_metro,
				:ann_wc,
				:ann_pf,
				:ann_alarme,
				:ann_temps,
				NOW()
				)');

//    if ($_FILES['ann_photo_principale']['error'] === 0) {
//        $extension = strrchr($_FILES['ann_photo_principale']['name'], '.');
//        $nomPhoto = 'ann_photo_principale' . mt_rand(0, 9999) . $extension;
//        move_uploaded_file($_FILES['ann_photo_principale']['tmp_name'], '../photos/photo_article/' . $nomPhoto);
//
//    } else if ($_FILES['ann_photo_principale']['error'] === 4) {
//
//        $nomPhoto = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image
//
//    } else {
//
//        $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image';
//        $ok = false;
//    }
//
//    $countPhotos = count($_FILES['ann_autre_photo']);
//    if (count($_FILES['ann_autre_photo'])) {
//        for ($i = 0; $i < $countPhotos; $i++) {
//            if ($_FILES['ann_autre_photo']['error'][$i] === 0) {
//
//                $extension = strrchr($_FILES['ann_autre_photo']['name'][$i], '.');
//                do {
//                    $nomAutrePhoto = 'ann_autre_photo' . mt_rand(0, 9999) . $extension;
//                } while (file_exists('../photos/photo_article/' . $nomAutrePhoto));
//
//                move_uploaded_file($_FILES['autre_photo']['tmp_name'][$i], '../photos/photo_article/' . $nomAutrePhoto);
//
//            } else if ($_FILES['autre_photo']['error'][$i] === 4) {
//
//                $nomAutrePhoto = 'client-image-placeholder.png'; //mon image par défaut si je n'ai pas d'image
//
//            } else {
//
//                $_SESSION['error_message'][] = 'Erreur lors de l\'upload de l\'image ' . $_FILES['autre_photo']['error'][$i];
//                $ok = false;
//            }
//
//            if (!empty($nomAutrePhoto)) {
//                $tableauPhoto[$i] = $nomAutrePhoto;
//                $nomAutrePhoto = '';
//            }
//
//        }
//    }


    $ajout->bindValue(':ann_title', $_POST['title'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_price', $_POST['price'], PDO::PARAM_INT);
    $ajout->bindValue(':ann_adresse', $_POST['adresse'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_cp', $_POST['cp'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_ville', $_POST['ville'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_colocataire', $_POST['sexe'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_description', $_POST['description'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_situation', $_POST['travail'], PDO::PARAM_STR);
    // $ajout->bindValue(':ann_biens', $_POST['ann_biens'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_chambre_dispo', $_POST['chambre'], PDO::PARAM_INT);
    $ajout->bindValue(':ann_ascenseur', $_POST['ascenseur'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_tele', $_POST['tele'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_internet', $_POST['internet'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_animal', $_POST['animal'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_sdb', $_POST['sdb'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_fume', $_POST['fume'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_metro', $_POST['transport'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_wc', $_POST['wc'], PDO::PARAM_INT);
    //$ajout->bindValue(':ann_pf', $_POST['pf'], PDO::PARAM_STR);
    //$ajout->bindValue(':ann_cuisine', $_POST['cuisine'], PDO::PARAM_INT);
    $ajout->bindValue(':ann_alarme', $_POST['alarme'], PDO::PARAM_STR);
    $ajout->bindValue(':ann_temps', $_POST['temps'], PDO::PARAM_STR);

    // $ajout->bindValue(':photo_principale', $nomPhoto);
    // $ajout->bindValue(':autre_photo', serialize($tableauPhoto));


    $ajouter = $ajout->execute();

}

//var_dump($ajouter);
//var_dump($ajout->errorInfo());

// header('location: index-co.php');