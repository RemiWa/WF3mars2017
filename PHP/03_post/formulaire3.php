<?php
//réaliser un formulaire pseudo / email dans formulaire 3  en récupérant et affichant les informations dans formulaire 4. Une fois le formulaire soumis, vérifier que le pseudo n'est pas vide. Dsi tel est le cas, afficher un message d'erreur à l'internaute dans formulaire 4


?>

<h1> Formulaire 3 </h1>
<form method="post" action="formulaire4.php">
    <label for="pseudo">pseudo</label>
    <input type="text" id="pseudo" name="pseudo"><br>

    <label for="mail">Mail</label>
    <input type="text" id="mail" name="mail"><br>

    <input type="submit" name="validation" value="envoyer">
</form>