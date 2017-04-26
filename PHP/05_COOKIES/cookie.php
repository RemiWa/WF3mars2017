<?php

//******************************
// C O O K I E S
//******************************

// Un cookie est un petit fichier (4ko max) déposé par le serveur du site sur l eposte de l'internaute et uqui peut contenir des informations sous forme de texte. Ils sont automatiquement renvoyés au serveur web par le naigateur lorsque l'internaut navigue dans les pages concernées par les cookies.$_COOKIE
//PHP pue ttrès facile récupérer les données contenues dans un cookie. Cest infos sont stockées dasn la superglobale $_COOKIE.

//précaution à prendre avec les cookies: un cookie étant sauvegardé sur le poste de l'internaute, il peut être volé ou détourné. On y stocke donc pas de données sensibles. (mdp, cb, ...)


//Application pratique : Nous allons stiocker la langue choisie par un internaute dans un cookie.

//1-Affectation de la langue à la variable $langue

   if (isset($_GET['langue'])){  //Si une langue est passée dans l'url c'est que nous avons cliqué sur un lien
       $langue = $_GET['langue'];
   } else if ( isset($_COOKIE['langue'])) { // ici $_COOKIE et une superglobale dont l'indice correspond au nom du cookie . On entre dans le else if si un cookie appelé 'langue' a été envoyé par el client. 
       $langue = $_COOKIE['langue'];
   } else {
       $langue = 'fr'; //Par défaut, si aucun choix n'est fait et que n'existe aps de cookie, alors on affecte la langue 'fr'
   }

//2-Envoi du cookie avec la langue

$un_an = 365*24*60*60; //un An exprimé en secondes

setcookie('langue', $langue, time() + $un_an); // setcookie ('nom', 'Valeur', 'date expiration en Timestamp') permet de créer et d'envoyer le cookie ver le client

//3-Affichage de la langue

echo 'Votre langue : ';
switch($langue) {
    case 'fr' : echo 'français'; break;
    case 'es' : echo 'Espagnol'; break;
    case 'en' : echo 'Anglais'; break;
    case 'it' : echo 'Italien'; break;
}

?>

<h1>Votre langue</h1>
    <ul>
        <li><a href="?langue=fr">Français</a></li>
        <li><a href="?langue=es">Espagnol</a></li>
        <li><a href="?langue=en">Angais</a></li>
        <li><a href="?langue=it">Italien</a></li>        
    </ul>