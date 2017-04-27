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

?>