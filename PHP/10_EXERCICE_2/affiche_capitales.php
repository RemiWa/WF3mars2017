<?php
/*
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, blablabla, Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente.


*/

//Creation du tableau
$capitales= array('France' => 'Paris','Italie' => 'Rome', 'Espagne' =>'Madrid','inconnu'=> 'Blablabla', 'Allemagne' => 'Berlin');

// echo print_r($capitales);

    foreach($capitales as $indice => $valeur){
        if ($indice =='inconnu'){
        echo 'ça n\'existe pas';
    }else{
        echo '<P>'. $valeur. ' est la capitale de '. $indice. '</p>';
    }

};


?>
