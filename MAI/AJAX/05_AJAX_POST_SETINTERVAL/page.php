<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>exercice AJAX 5</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <h1>Employé</h1>
        <div id="tableau_employes"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        //mise en place d'un timer en javascript
        setInterval("ajax()", 5000);
        //2 arguments => la finction à exécuter , le timer en millisecondes

        function ajax() {
            var file ="ajax.php"; // fichier cible
            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function(){
                console.log(xhttp.readyState);

                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById("tableau_employes").innerHTML = obj.resultat;
                }
            }
            xhttp.send();
        }
    </script>

  </body>
</html>