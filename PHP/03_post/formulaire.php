<?php
//************************************
//la superglobale $_POST
//************************************

// $_POST est une superglobale, et donc, un array disponible dans tous les contextes du script. C'est un méthode qui permet de récupérer des informations issues d'un formulaire.$_COOKIE
// Un formulaires est obligatoirement dans des balises form avec la désingation des attributs method (pour  get ou psost) et l'action qui indique le fichier de destination des donnees du formulaire' Un bouton de type ubmit déclenche un envoi de données vers le serveur§.


// Les attributs name du formulaire constituent des indices de l'array $_post de réception. Les données saisies dans les champs constituent des caleurs correspondantes.


print_r($_POST);
 
if(! empty($_POST)) { //not empty signifie ici que l'array $_POST n'est pas vuide, autrement dit que le formulaire a été posté. Il peut cependant avoir été posté avec des champs vides: les valeurs de l'array sont vide MAIS il y a bien les indices 'prénom' et 'description' à l'interieur.

echo 'Prénom : '. $_POST['prenom'].'<br>';
echo 'Description : '. $_POST['description'].'<br>';
}

?>

<h1> Formulaire </h1>
<form method="post" action="">
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="description">Description</label>
    <textarea  name="description" id="description"></textarea><br>
    
    <input type="submit" name="validation" value="envoyer">
</form>