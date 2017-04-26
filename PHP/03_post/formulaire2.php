<?php

//EXERCICE
//****************************
//Créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page.$_COOKIE
//


 
if(! empty($_POST)) { //not empty signifie ici que l'array $_POST n'est pas vuide, autrement dit que le formulaire a été posté. Il peut cependant avoir été posté avec des champs vides: les valeurs de l'array sont vide MAIS il y a bien les indices 'prénom' et 'description' à l'interieur.

echo 'Ville : '. $_POST['Ville'].'<br>';
echo 'CP : '. $_POST['CP'].'<br>'; // attention, les name sont sensiblesà la casse
echo 'Adress : '. $_POST['Adress'].'<br>';
}


?>

<h1> Formulaire 2 </h1>
<form method="post" action="">
    <label for="Ville">Ville</label>
    <input type="text" id="Ville" name="Ville"><br>

    <label for="CP">Prénom</label>
    <input type="text" id="CP" name="CP"><br>

    <label for="Adress">Adress</label>
    <textarea  name="Adress" id="Adress"></textarea><br>
    
    <input type="submit" name="validation" value="envoyer">
</form>