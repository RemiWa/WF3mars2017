<?php

//exercice : 
/*
    1. Réaliser un formulaire permettant de sélectioner un fruit dasn un selecteur, et de saisir un poids quelconque exprimé en grammes
    2. Faire le traitement du formulaire pour affihcer le prix du fruit choisi selon le poids indiqué en passant par la fonction calcul
    3. Faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui ci soit validé.
*/
// include ('fonctions.inc.php');

//     if (isset($_POST['Fruit']) && isset($_POST ['Poids'])) {
//        echo calcul($_POST['Fruit'], $_POST['Poids']);
//     }else{
//         echo 'Veuillez selectionner un fruit et indiquer son poids';
//     }
// ?>


<?php 
include('fonctions.inc.php');

if (!empty($_POST)) {
    echo calcul($_POST['Fruit'],$_POST['Poids']).'';
}
?>?

<form method= "POST" action="">
        <select name="Fruit" id="Fruit">
            <option value="NULL">-----</option>
            <option value="Cerises" <?php if (isset($_POST['Fruit']) && $_POST['Fruit'] == 'Cerises') echo 'selected'; ?>>Cerises</option>
            <option value="Bananes"<?php if (isset($_POST['Fruit']) && $_POST['Fruit'] == 'Bananes') echo 'selected'; ?>>Bananes</option>
            <option value="Pommes"<?php if (isset($_POST['Fruit']) && $_POST['Fruit'] == 'Pommes') echo 'selected'; ?>>Pommes</option>
            <option value="Peches"<?php if (isset($_POST['Fruit']) && $_POST['Fruit'] == 'Peches') echo 'selected'; ?>>Peches</option>
            </select><br>
            <input type="text" name="Poids" placeholder="poids en grammes" value="<?php echo $_POST['Poids'] ?? ''; ?>">
</form> 