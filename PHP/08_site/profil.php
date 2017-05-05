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


//EXERCICE
// Afficher le suivi des commandes du membre s'il y en a) dans une liste ul li :id commande, :date, :etat de la commande.S'il n'y en a pas, afficher aucune commande en cours"

    //1 $pdo -> Connexion BDD
    //2 Requete
    //3 Fetch (while)
    // 4- Affcihage


// if(isset($_SESSION['membre']){
    $id_membre =$_SESSION['membre']['id_membre'];
    $suivi = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'");// DAns une requete sql, on met les variables entre quotes. Pour mémoire, si on y met un array, celui ci perd ses quotes autour de l'indice. A savoir: on ne peut pas le faire avec un array multidimensionlel

    //S'il y ades commandes dans $resultat, on les affiche
    if ($suivi->rowCount() > 0) {
        //on affiche les commandes
     $contenu .= '<ul>';
    while ($suivi2 = $suivi->fetch(PDO::FETCH_ASSOC)){

    $contenu .= '<li>Votre commande N°: '.$suivi2['id_commande'].' du '.$suivi2['date_enregistrement'].' est: '.$suivi2['etat'].' </li>';
    $contenu .= '</ul>';

    };
    } else { //il n'y a pas de coammandes'
    $contenu .= '<p>Vous n\'avez pas de commande en cours</p>';
};

//---------------------------------------------------AFFIC§HAGE -----------------------------------------------------------

require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');

?>