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


?>