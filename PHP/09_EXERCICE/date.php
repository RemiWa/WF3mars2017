<?php
/*
1- Creer une fonction qui retourne la conversion d'une date FR en Ddate US ou inversement, Cette fonction prend  2 paramètres: une date (valideà et le format de conversion "us" ou "fr"
2 Vous validez que le paramètre de cformat est bien us ou FR, la fonction retourne un message si ce n'est pas le cas.
*/

function afficheDate( $date, $format){
    // Version avec objet date:
    // $objetDate = new DateTime($date);
    // if ($format == 'FR'){
    //     return $objetDate-> format('d-m-Y'.'<br>';
    // }elseif ($format == 'US'){
    //     return $objetDate-> format('Y-m-d').'<br>';
    // }else{
    //     return 'Le format demandé est incorrect';
    // }

    //Autre Version
    if ($format == 'FR'){
        return strftime('%d-%m-%Y', strtotime($date)); //strto time transforme en timestamp, et strftime le transfore dans le format
    } elseif ($format == 'US'){
    return strftime('%Y-%m-%d', strtotime($date));
    }else {
        return 'Le format demandé est incorrect';
    }

}


echo afficheDate('05-05-2017', 'US');
echo afficheDate('2017-05-05', 'FR')










































// $dateFr = strtotime('%m-%d-%y');
// $dateUs = strtotime('%y-%m-%d');
// $lang = "fr";

// function conversion($dateFr, $dateUs, $lang){

//     if $lang == 'fr'{

//         return strftime('%y-%m-%d', $dateFr);

//     }else if $lang == 'us'{

//         return strftime('%d-%m-%Y', $dateUs);

//     }

// ?>