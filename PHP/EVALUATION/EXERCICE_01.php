<?php

/*
Créer un tableau en PHP contenant les infos suivantes :  ● Prénom ● Nom ● Adresse ● Code Postal ● Ville ● Email ● Téléphone ● Date de naissance au format anglais (YYYY-MM-DD)

A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML. La date sera affichée au format français (DD/MM/YYYY).

Bonus :  Gérer l’affichage de la date de naissance à l’aide de la classe DateTime

*/



$presentation = array('Rémi' =>'prénom','Warin'=> 'nom', 'privé'=>'adresse','75015'=> 'code postal','Paris'=> 'ville', 'warin.remi@gmail.com'=> 'email','0000000000'=> 'telephone', '1986/02/06' => 'date de naissance');


function afficheDate( $date, $format){
    $conversion = new DateTime($date);
    if ($format == 'FR'){
        return $objetDate-> format('d-m-Y').'<br>';
    }elseif ($format == 'US'){
        return $objetDate-> format('Y-m-d').'<br>';
    }else{
        return 'Le format demandé est incorrect';
    };

}



    foreach($presentation as $indice => $valeur){
        if ($indice =='null'){
        echo 'Personne inconnue';
    }else{
        echo '<li>'. $valeur.' -- '. $indice. '</li>';
    }

};

?>

