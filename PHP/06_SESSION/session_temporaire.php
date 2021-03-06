<?php
// Slouvent sur les site banquaires, on est déconnecté automatiquement au bout de W minutes d'inactivité.

session_start(); // On crée une session

echo '<pre>'; print_r($_SESSION); echo '</pre>';

if(isset($_SESSION['temps']) && isset($_SESSION['limite'])) {

    //On vérifie si les dix secondes sont écoulées:$
    if (time() > ($_SESSION['temps'] + $_SESSION['limite'])) {
        session_destroy(); // Si les 10 secondes sont écoulées on supprime la session
        echo '<hr> Votre session a expiré, vous êtes déconnectés <hr>';
    } else {
        $_SESSION['temps']= time(); //sinon, on remet à jour le temps pour relancer le dix secondes
        echo '<hr> Connexion mise à jour </hr>';
    }
}else { //On entre dans ce else la première fopis pour remplir la session :
    $_SESSION['temps'] = time(); // On remplit la session avec un indice 'temps' qui contient le timestamp de l'instant présent au moment où l'on crée la session.
    $_SESSION['limite'] = 10; // Ici limite est exprimé en secondes. On fixe la limite de session à 10 secondes

    echo 'Vous êtes connectés';
}