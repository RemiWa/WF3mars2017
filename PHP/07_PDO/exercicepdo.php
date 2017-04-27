<?php
//exercice

//principe: crér un formulaire qui permet d'enregistrer un nouvel employé dans la basae entreprise .$_COOKIE

/* 
    les étapes:

    Création du formulaire html
    connexion à la bdd
    Lorsque le formulaire est posté, insertion des informations du formulaire en BDD (requete préparée)
    Afficher à la fin un message l'employé a été ajouté
*/

$message = ''; //varable d'affichage des messages d'erreut de validation du formulaire.

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//print_r($_POST).'<br>';

if(!empty($_POST)) { //si le formulaire est posté, il y a des indices dasn $_POST, il n'est pas vide'

    //controle du formulaire
    if(strlen($_POST['prenom']) <3 || strlen($_POST['prenom']) >20 ) $message .= '<div>Le prénom doit comporter au moins 3 caractères<div>'; //strelen indique le nombre de caractères
    if(strlen($_POST['nom']) <3 || strlen($_POST['prenom']) >20 ) $message .= '<div>Le nom doit comporter au moins 3 caractères<div>'; //strelen indique le nombre de caractères
    
    if ($_POST['sexe'] != 'm' && $_post['sexe'] != 'f') $message .= '<div>Le sexe n\'est pas correct</div>';
    
    if(strlen($_POST['service']) <3 || strlen($_POST['service']) >20 ) $message .= '<div>Le service doit comporter au moins 3 caractères<div>'; //strelen indique le nombre de caractères

    if (!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= '<div>Le salaire doit être supérieur à 0</div>'; //is_numeric teste si c'est un nombre'
    
    $tab_date = explode('-', $_POST['date_embauche']); //met le jour, le mois et l'année dans un array pour pouvoir les passer à la fonction checkdate($mois, $jour, $annee')
    if (!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1], $tab_date[2], $tab_date[0]) )) $message .= '<div>Lesalaire doit être supérieur à 0</div>';

    if(empty($message)) { //si les messages sont vides, c'est qu'il n'y a pas d'erreurs/



    $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)" );
 
    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR); 
    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR); 
    $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR); 
    $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR); 
    $resultat->bindParam(':date_embauche',$_POST['date_embauche'], PDO::PARAM_STR); 
    $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_INT); 

    $req = $resultat->execute();
    
    //afficher un message "l'employé a été ajouté"
    if($req){ //execute() ci dessus renvoie true si ça a fonctionné, sinon FALSE
        echo 'l\'emplyé a bien été ajouté';

    }else{
        echo 'une erreur est survenue lors de l\'enregistrement';
    }
}

}
    


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>  

    <h1> Formulaire</h1>
    <?php echo $message ?>
    <form method="post" action="">

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"><br>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom"><br>

        <label for="sexe">sexe</label>
        <input type="radio" name="sexe" value="m"> h
        <input type="radio" name="sexe" value="f"> f<br>

        <label for="service">service</label>
        <input name="service" id="service"></input><br>

        <label for="date_embauche">date embauche</label>
        <input  name="date_embauche" id="date_embauche"></input><br>

        <label for="salaire">salaire</label>
        <input  name="salaire" id="salaire"></input><br>
        
        <input type="submit" name="validation" value="envoyer">
    </form>
        
</body>
</html>
