<?php

    //********************************** Fontions membres ****************************************************
    function internauteEstConnecte(){
        //cette fontion indique si l'internaute est connecté:'Si la session membre est définie,c 'est que l'interaute est passé par la page de connexion avec le bon MDP
        if (isset($_SESSION['membre'])) {
            return true;
        } else {
            return false;
        }

        // on pourraiit écrire :
        // return isset($_SESSION['membre']); car isset retourne déjà TRUE ou false

    }

//---------------
function internauteEstConnecteEtEstAdmin() {
    //cette fonction indique si le membre connecté est admin
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
        return true;
    } else {
        return false;
    }
}

//------------
function executeRequete($req, $param = array()) { //param est una rray vide par défaut : il est donc optionnel

    //htmlspecialchars
    if( !empty($param)) {
        //si on a bien reçu un array, on le traite:
        foreach($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); //transforme en entités HTML chaque caractères spéciaux, dont les quotes
        }

}
    // La requête préparée
    global $pdo; // $pdo est déclarée dan l'espace global (fichier init.inc.php) Il faut donc faire global $pdo pour l'utiliser dans l'espace local de cette fonction'
    $r = $pdo->prepare($req);
    $succes = $r->execute($param); //On execute la requete en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur

    //traitement de l'erreur sql éventuelle:
    if(!$succes) { //$succes vaut false, alors il y a erreur sur la requête
        die('Erreur sur la reqête SQL : ' . $r->errorInfo()[2] ); //die arrete le script et affiche un message. ICi on affiche le message d'erreur SQL donne par errorinfo(). Cette meéthode retourne un array, dans lequel le message se situe à l'indice [2]'
    }

    return $r; //retourne un objet PDOStatement qui contient le résultat de la requête

}

//--------------------------------------------------Fontions du panier --------------------------------------------------

function creationDuPanier (){
    if(!isset($_SESSION['panier'])){
        //s'il n'existe pas de paniuer dans session, on le crée
        $_SESSION['panier'] = array(); // Le panier est un array vide
        $_SESSION['panier']['titre'] =array();
        $_SESSION['panier']['id_produit'] =array();
        $_SESSION['panier']['quantite'] =array();
        $_SESSION['panier']['prix'] =array();

    }
}


function ajouterProduitDansPanier ($titre, $id_produit, $quantite, $prix ){
    //Ces arguments sont en provenance de panier.php

    creationDuPanier(); //créer la structure si elle n'existe pas
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); //arraysearch retourne un chiffre si l'id_produit est prése,nt dans l'array $_session['panier'] qui correspond à l'indice auquel se situe l'éléemnt. Sinon retourne false.
    if ($position_produit === false){ // Si le produit n'est pas dans le panier, on l'ajoute

        $_SESSION['panier']['titre'][] = $titre; // les [] pour ajouter l'élément à la fin de l'array
        $_SESSION['panier']['id_produit'][] = $id_produit; // les [] pour ajouter l'élément à la fin de l'array
        $_SESSION['panier']['quantite'][] = $quantite; // les [] pour ajouter l'élément à la fin de l'array
        $_SESSION['panier']['prix'][] = $prix; // les [] pour ajouter l'élément à la fin de l'array
        }else{
           // si le produit existe, in ajoute la quantité nuvelle à la qté déjà présente
            $_SESSION['panier']['quantite'][$position_produit] += $quantite;

        }

    }



//----------------------
function montantTotal(){

$total = 0; //contient le total de la commande
    for ($i=0; $i< count($_SESSION['panier']['id_produit']); $i++){
        //tant que i est inferieur au nombre de produits présents dnasa le panier, on additionne le prix par la quantité
        $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i]; //le symbole += pour ajouter la nouvelle valeur à l'ancienne sans l'écranser


    }

    return round($total, 2); // on retourne le total arrondi à 2 décimales
}

//----------------
function retirerProduitDuPanier($id_produit_a_supprimer){
//On cherche la position du produit dnas le panier
$position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']); //array search renvoit la position du produit (integer, sinon false s'il n'y est pas )

if ($position_produit !== false){

    if($_SESSION['panier']['quantite'][$position_produit] >1 ){
    $_SESSION['panier']['quantite'][$position_produit] -=1;

    } else {

        // Si le produit est biend asn le panier, on coupe sa ligne
        array_splice($_SESSION['panier']['titre'], $position_produit, 1); //efface la portion du tableau à partir de l'indice indiqué par $position_produit et sur 1 ligne

        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);

        }

    }

}

//Exercice: Créer une fonction qui retourne le nombre de produits différents dans le panier Et afficher le résultat à côté du lient panier dans le menu de navigation:
// panier (3) Si le panier est video, on affiche panier (0)/

function compte(){
   if (isset($_SESSION['panier'])){
    return count($_SESSION['panier']['titre']);
    // return array_sum($_SESSION['panier']['quantite']);
   }else{
    return 0;
    //après un return, les instructions ne sont pas executées

    }
}
;



?>