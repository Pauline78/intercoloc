<?php
/*
Fichier de code commun a notre application
> session start
> connexion BDD
> chemin absolu du serveur
*/
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bboureau_projet_2a', 'bboureau', 'cZFFZfd6mq',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
const PUBLIC_URL ='http://pferaut.eemi.tech/intercoloc/'; //base de mon URL
const PUBLIC_PATH ='/home/pferaut/public_html/intercoloc/'; //racine de mon serveur
