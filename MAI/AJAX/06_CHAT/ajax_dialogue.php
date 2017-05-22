<?php

require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = '';
$liste_message = $pdo->query("SELECT membre.pseudo, membre.civilite, dialogue.message FROM dialogue, membre WHERE membre.id_membre = dialogue.id_membre ORDER by dialogue.date" );


$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$arg = isset($_POST['arg']) ? $_POST['arg'] : '';

if($mode == 'liste_membre_connecte' && empty($arg)){

 $prenom = file("prenom.txt");
 foreach($prenom as $valeur){
     $tab['resultat'] .= '<p>'.$valeur.'</p>';
     }
 }

 elseif($mode == "postMessage"){

     //on teste s'il y a bien un messaga a enregister
     $arg = trim($arg); // on enlève les espace avant et après la chaine ainsi que si le message ne possède que des espaces.
     if(!empty($arg)) // Si le message n'est pas vide, alors on l'enregistre
     {
        //  $position = strpos($arg, ">");
        //  $arg = substr($arg, $position );
        // Les deux lignes précédentes sont à décommenter si l'on enregistre avec le pseudo>'

        $arg = addslashes($arg);

         //enregistrement du message
         $pdo->query("INSERT INTO dialogue (id_membre, message, date) VALUES ($_SESSION[id_membre], '$arg', NOW())");
         $tab["resultat"] .= "message enregistré";
     }

 }
elseif($mode == "message_tchat"){
    //récuperer tous les messages de la table dialogue
    //traitement de l'objet resultat avec un while pour place la reponse dans $tab['resultat']

    while($message = $liste_message-> fetch(PDO::FETCH_ASSOC)){

        if ($message['civilite']== 'm')
        {
            $tab['resultat'] .= '<p class ="bleu">' .ucfirst($message['pseudo']). '>'.$message['message'].'</p>';
        }else {
            $tab['resultat'] .= '<p class ="rose">' .ucfirst($message['pseudo']). '>' .$message['message'].'</p>';

            }
        }
    }elseif ($mode == 'liste_membre_connecte' && !empty($arg)){
        //si $arg n'est pas vide alors on a un pseudo et nous devons le retirer du fihier prenom.txt
        $contenu = file_get_contents('prenom.txt'); //on récupère le contenu du fichier prenom.txt dansa la variable $contenu
        $contenu = str_replace($arg, "", $contenu); // on remplace le pseudo recherché par rien
        file_put_contents('prenom.txt', $contenu); // On écrase l'ancien contenu par le nouveau où l'on a supprimé le pseudo concerné
    }


echo json_encode($tab);