<?php
//*****************************
// L E S  S E S S I O N S
//*****************************

// Le terme de session désigne la période de temps correspondant à l a navigation continue de l'internaute sur un site. Continue car si l'interneaute femre le navigateur, la session s'interrompt.

// Un fichier temporaire appelé session est crée sur le serveur avec un identifiant unique. Cette session est liée à un internaute car dans le même temps, un cookie est déposé sur le poste de l'internaute avec l'identifiant. Ce cookie se détruit lorsque l'on quitte e navigateur. On stocke entres autres dans une session les paniers d'achats, ou les informations de connexion. Ces infos sont accessibes dasn tous les scripts du site grace à la sessions.

// Création ou ouverture d'une session: 
session_start(); //permet de créer un fichier de session sur le serveur OU de l'ouvrir s'il existe déjà

// Remplissage de la session:
$_SESSION['pseudo'] = 'John';
$_SESSION['mdp'] = '1234'; //$_SESSION est une superglobale , donc un array

echo '1 - La session après remplissage : '; 
echo '<pre>'; print_r($_SESSION); echo '</pre>';

//vider une partie de la session en cours:
unset($_SESSION['mdp']); // nous pouvons supprimer une partie de la session avec unset()

echo '<br> 2- la session après suppression du mdp : ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';


// Supprimer entièrement la session:

//session_destroy(); //suppression de la session MAIS il faut savoir que le session_destroy est d'abord vu par l'interpréteur qui ne l'exécute qu'à la fin du script.

echo '<br> 3- La session après suppression totale : ';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; //En effet, on voir encore le contenu de la session car la suppression n'intervient qu'à la fin du script§. Pour s'en convaincre,vérifier que le fichier est supprimé dnas le dossier xampp/tmp'