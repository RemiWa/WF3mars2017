<h1>Page détail des articles :</h1>


<?php
//*******************************
//La superglobale $_GET
//*******************************
//$_GET représente l'url :  il s'agit d'une superglobale et comme toutes les superglobales d'un array. Superglobale signifie qu'il est dipsonible dans tous les contextes du script, y compris dansa les fonctions: il n'est pas encessaire de faiire global $_GET.$_COOKIE

//Les infos transitent dans l'urtl de la manière suivante: '
//page.php?indice1=valeur1&indice2=valeur2    (sasn espaces)
//chaque indice de cet url correspondent à un indice de l'array $_GEt et chaque valeur aux valeurs correspondantes aux indices'

if (isset($_GET['article']) && isset($_GET ['couleur']) && isset($_GET['prix'])){
// Si existent les indices article, couleurs et prix, on peut les afficher.
echo 'article :'.$_GET['article'].'<br>';
echo 'couleur :'.$_GET['couleur'].'<br>';
echo 'prix :'.$_GET['prix'].'<br>';
} else{
    echo'aucun produit selectioné'.'<br>';
}

