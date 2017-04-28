<?php

require_once('inc/init.inc.php');



//---------------------------------------------------TRAITEMENT -----------------------------------------------------------
// SI le visiteur n'est pas connecté, on l'envoit vers la page de connexion.php_ini_loaded_file
if(!internauteEstConnecte()){
    header('location:connexion.php'); //nous l'invitons à se connecter
    exit();

}

$contenu .= '<h2>Bonjour'.$_SESSION['membre']['pseudo'].'</h2>';

// On affiche le statu du membre
if($_SESSION['membre']['statut']==1){
    $contenu .= '<p>Vous êtes admin</p>';
} else {
    $contenu .= '<p>Vous êtes membre</p>';
}


$contenu .= '<div><h3> Voici vos informations de profil</h3>';
    $contenu .= '<p>Votre email :'.$_SESSION['membre']['email'].'</p>';
    $contenu .= '<p>Votre adresse :'.$_SESSION['membre']['adresse'].'</p>';
    $contenu .= '<p>Votre code postal :'.$_SESSION['membre']['code_postal'].'</p>';    
    $contenu .= '<p>Votre ville : '.$_SESSION['membre']['ville'].'</p>';    
    $contenu .= '</div>';    
        




//---------------------------------------------------AFFIC§HAGE -----------------------------------------------------------

require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');

?>