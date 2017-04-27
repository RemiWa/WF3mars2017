<?php
/*

    Le fichier init.inc.php sera inclus dabns tous les scripts (hors les fichiers inc eux même) pour initialiser les éléments suivants: 
    connexion à la bdd
    création ou ouverture de session 
    définir une constante pour le chemin du site
    inclusion dup fichier fonction.inc.php systematiquement dnas tous les scripts 

*/

//Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 //session_start();

//chemin du site
define('RACINE_SITE', '/PHP/08_site/'); //indique le dossier dans lequel se situe le site sans la racine localhost

//déclaration des variables d'affichage du site:
$contenu = '';
$contenu_gauche = '';
$contenu_droite='';

//Autre inclusions:
require_once('fonction.inc.php');

?>