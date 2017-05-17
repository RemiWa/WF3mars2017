<?php

    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


    $liste_prenom= $pdo->query('SELECT prenom, id_employes FROM employes');
    $liste = "";
        while($personne = $liste_prenom ->fetch(PDO::FETCH_ASSOC)){
            $liste .= '<option value="'.$personne['id_employes'].'">'.$personne['prenom'].'</option>';
        } ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <style>
        *{ font-family: sans-serif; text-align: center;}
        form, #resultat{ width: 50%; margin:0 auto;}
        select, input { padding: 5px; width: 100%; border-radius: 3px;  border: 1px solid;}
        input{ cursor:pointer;}
        table{border-collapse: collapse; width: 80%; margin: 0 auto;}
        td, th{ padding: 10px;}
    </style>
</head>
<body>
    <form id="mon_form">
        <label>Prénom</label>
        <select id="choix">

            <?php echo $liste ?>

        </select>
        <br>
        <input type="submit" id="valider" value="Valider" />
    </form>
    <hr>
    <div id="resultat"></div>

    <script>

        var formulaire = document.getElementById("mon_form").addEventListener("submit", ajax);

        function ajax(evt){

            evt.preventDefault();
            var champSelect = document.getElementById("choix");
            var valeur = champSelect.value;

            console.log(valeur);

            var file="ajax.php";
            var parametres="personne="+valeur;

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


            xhttp.onreadystatechange = function(){
                if(xhttp.readyState ==4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    var reponse = JSON.parse(xhttp.responseText);
                    document.getElementById("resultat").innerHTML = reponse.resultat;
                }
            }
         xhttp.send(parametres);
    }


    //mettr en place un évênement sur la validatin du formulaire (submit)
    //bloquer le rechargement de la page consecutid à la validation du formulaire
    //délcencher une requete ajax qui envoie sur ajac.php
    //sur ajax.php récupérrer les infos de l'employes correspondant à l'id récupérer
    //envoyer une réponse sous forme de tableau html. Le tableau doit avoir deux lignes. Une avec le nom des colonnes, et l'autre avec les valeurs.
    </script>
</html>