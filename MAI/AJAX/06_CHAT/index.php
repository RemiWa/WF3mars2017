<?php
require_once("inc/init.inc.php");

if(!empty($_SESSION['pseudo'])){
    //si l'utilisateur est déjà présent dans la session on le redirige sur dialogue.php'
    header("location:index.php");
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat</title>
</head>

<body>
    <fieldset class="cadre_accueil">
        <div id="message"></div>
    </fieldset>
    <fieldset class="cadre_accueil">
        <form id="form">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" value=""><br>

            <label for="civilite">Civilité</label>
            <select name="civilite" id="civilite">
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select><br>

            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" value=""><br>

            <label for="date_de_naissance">Date de naissance</label>
            <input type="date" id="date_de_naissance" name="date_de_naissance" value="" placeholder="YYYY-mm-dd"><br>

            <input type="submit" name="connexion"  value="se connecter">

        </form>
    </fieldset>

    <script>
    //mise en place d'unévênement sur la validation d'un formulaire
    document.getElementById("form").addEventListener("submit", function(event){
            event.preventDefault(); // on bloque la soumission du form (pour éviter le rechagrement de page)

            var champPseudo = document.getElementById("pseudo");
            var pseudo = champPseudo.value;

            var champCivilite = document.getElementById("civilite");
            var civilite = champCivilite.value;

            var champVille = document.getElementById("ville");
            var ville = champVille.value;

            var champDate = document.getElementById("date_de_naissance");
            var date_de_naissance = champDate.value;

            var parametres = "mode=connexion&pseudo="+pseudo+"&civilite="+civilite+"&ville="+ville+"&date_de_naissance="+date_de_naissance;

            var file ="ajax_connexion.php";

            if(window.XMLHttpRequest){
                var xhttp = new XMLHttpRequest();
            } else {
                var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE
            }

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function(){
                console.log(xhttp.readyState);

                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById("message").innerHTML = obj.resultat;

                    if(obj.pseudo =="disponible"){
                        //si l'indice pseudo a la valeur disponible alors on peut connecter l'utilisateur
                        //on redirige donc vers dialogue.php
                        window.location.href = 'dialogue.php';
                    }

                }

            }

            xhttp.send(parametres);
    });
    </script>

</body>
</html>