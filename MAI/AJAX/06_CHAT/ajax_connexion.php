<?php

require_once("inc/init.inc.php");

$tab = array();
$tab['resultat']="ok";
$tab['pseudo'] = "disponible";

$erreur = false; // vairable de contrôle den fin de script. Si la valeur est passée à true, il y a une erreur (exemple le pseudo est indisponible)


// action = condition ? condition vrai :  condition fausse;
$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
$ville = isset($_POST['ville']) ? $_POST['ville'] : '';
$date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : '';


if($mode == "connexion"){
    //traitement de la connxion / inscription
    // requete pour tester si le pseudo est déjà présent dans la bdd
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo' ");
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    if($resultat->rowCount() == 0){ //s'il n'y a pas de ligne alors le pseudo est libre


    $time = time(); // on récupère le timestamp
    $pdo->query("INSERT INTO membre (pseudo, civilite, ville, date_de_naissance, ip, date_connexion) VALUES ('$pseudo','$civilite', '$ville', '$date_de_naissance', '$_SERVER[REMOTE_ADDR]', '$time')");

    $id_membre = $pdo->lastInsertId(); // On récupère le dernier id inséré
    $tab['resultat'] = "Membre enregistré !";
    }
    elseif ($resultat ->rowCount() > 0 && $_SERVER['REMOTE_ADDR'] == $membre['ip']){
        // SI le pseudo existe et que l'adresse ip est la même que celle enregistrée c'est donc le même utiisateur.
        // on met à jur uniquement sa date_connexion
        $time = time();
        $pdo->query("UPDATE membre SET date_connexion=$time WHERE id_membre = $membre[id_membre]");
        $id_membre = $membre['id_membre'];
    } else {
        // Le pseudo est déjà pris, l'adresse ip ne correspond pas à ce pseudo
        $tab['resultat'] = "Pseudo indisponible, veuillez recommencer";
        $erreur = true; // Nous somme dnas un cas d'erreur, nous changeon la valeur de cette variable pour la tester après.'
        $tab['pseudo'] = "indisponible"; // évite la redirection depuis index.php
        }

    if(!$erreur){ // if($erreur ==false) // s'il n'y a pas sd'erreur durant les taitements précédents'
        //On place dans la $_SESSION le pseudo, l'id et la civilité de l'utilisateur
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['civilite'] = $civilite;

        $f = fopen("prenom.txt", "a");// on ouvre le fichier prenom.txt sinon on le crée.
            fwrite($f, $pseudo. "\n"); // On écrit dasn ce fichier le pseudo de l'utilisateur.$_COOKIE
            fclose($f); //permet de fermer le fichier et libérer la ressource
    }

}
echo json_encode($tab);