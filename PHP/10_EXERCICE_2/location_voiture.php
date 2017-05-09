<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location.

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

//traitement du formulaire

if(!empty($_POST)){ // SI le formulaire st soumis

    $nbrejours =(int)$_POST['nbrejours']; // Force à transformer en integer. puis on vérifie s'il est inférieur ou égal à 0 Note: si $_POST['nbrejours] est une chaine de caraceres, $jours prend la valeur 0
    if ($nbrejours <= 0) $message .= '<div> Erreur sur le nombre de jours </div>';

    //On peut aussi la methode ctype_digit() qui véritfie si une chaîne est un entier
    if (!ctype_digit($_POST['nbrejours'])||$_POST['nbrejours'] <= 0) $message .= '<div> Erreur sur le nombre de jours </div>';

    if(! in_array($_POST['categorie'], $categories)) $message .='<div>Erreur sur la catégorie</div>';

    //puis on vérifie s'il ya des messages d'erreur
    if(empty($message)){
        //on appelle la fonction calcul et on stocke son résultat dans une variable pour pouvoir l'afficher.
        $afficheResultat = prixLoc($_POST['categorie'], $_POST['nbrejours']);
    }

}


$categories= array('A', 'B', 'C', 'D');
$message = '';
$afficheResultat= '';

function prixLoc ($categorie, $nbrejours){
    switch($categorie){
        case 'A': $prix = 30; break;
        case 'B': $prix = 50; break;
        case 'C': $prix = 70; break;
        case 'D': $prix = 90; break;
        default : return 'il y a un problème sur le prix';
    }

    $prixLoc = $prix * $nbrejours;

    if($prixLoc > 150){
        $prixLoc = 0.9 * $prixLoc;
    }
    return "La location de votre vehicule sera de $prixLoc pour $nbrejours jour(s) .";
}




//synthes des types numériques
// Is_numeric vérifie sic 'est un nombre décimal ou pas.
// is_int vérifie sic 'est un entier (ne marche pas avec les formulaires: dasn ce cas, caster le type pour le testere: cf ci dessus)
// is_float vérifie si c'est un nombre décimal
// ctype_digit vérifie si une chaine est un entier: utile dans le cas des formulaires.






?>






<!-- Formulaire en html-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice</title>
</head>
<body>

    <form method="POST" action="">

    <label for="categorie" id="categorie">Catégorie</label><br><br>
    <select name="categorie" id="categorie"><br><br>
        <?php
        foreach ($categories as $key => $categorie) {
            echo "<option value=$categorie> catégorie $categorie</option>";
        }
        ?>
    </select><br><br>

    <label for="nbrejours">Nombre de Jours</label><br><br>
    <input type="text" id="nbrejours" name="Nombre de jours"><br><br>

    <input type="submit" value="envoyer"><br><br>
    </form>
<?php echo $afficheResultat ?>

</body>
</html>