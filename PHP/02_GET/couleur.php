<?php

//Exercice
//  Dans el fichier listeFruits, créer 3 liens banane, kiwi, cerise. Quand on lcique sur les liens, on passe le nom du fruit, dans l'url à la page couleur.php'
//  Dans couleur.php, vous récupérerz le nom du fruit et affichez sa couleur.$_COOKIE
// Ne pas passser la couleur dans l'url, mais la déduire dans couleur.php

if (isset($_GET['fruit'])){

    if ($_GET['fruit'] == 'Banane'){
    echo 'le fruit est jaune';

    } else if ($_GET['fruit'] == 'Kiwi'){
        echo 'le fruit est vert';

    } else if ($_GET['fruit'] == 'Cerise'){
        echo 'le fruit est rouge';

    } else {
    echo'aucun produit selectionné'.'<br>';
 }
}
