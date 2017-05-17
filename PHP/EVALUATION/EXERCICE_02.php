<?php
/*

 Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains.

Cette fonction prendra deux paramètres :  ● Le montant de type int ou float ● La devise de sortie (uniquement EUR ou USD).

Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :  1 euro = 1.085965 dollars américains

Il faut effectuer les vérifications nécessaires afin de valider les paramètres.



*/


function conversion ($montant, $devise) {
    if (is_numeric($montant)){
        if($devise == 'USD'){
            $resultat = $montant * 1.085965;
            echo " $montant € donne(nt) $resultat $";
        }

        else if ($devise =='EUR'){
            $resultat = $montant * 0.9184;
             echo "$montant  $ donne(nt)  $resultat €";
        }
    }
}

// Déclarationd es variables d'affichage
 $contenu="";
 $resultat = "";

// Vérification des champs
if(!empty($_POST)){

	if (is_numeric($_POST['montant']) <= 0) {
		$contenu.='<div> Vous devez indiquer un montant</div>';
	}

	 if($_POST['devise'] != 'USD' && $_POST['devise'] != 'EUR'){
		 $contenu.= '<div> Vous devez selectioner une devise<div>';
	 }

	  if(empty($contenu)) {
		$resultat = conversion($_POST['montant'], $_POST['devise']);
	 };
}

?>


<!-- Formulaire HTML -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devises</title>
</head>
<body>

    <form method="post">
    <div>
    <label for="devise">Devise de sortie</label>
        <input type="radio" name="devise" id="USD" value="USD" checked >USD
        <input type="radio" name="devise" id="EUR" value= "EUR"  >EUR
    </div> <br><br>

    <div>
    <label for="montant">Montant</label>
    <input type="text" name="montant" >
    </div>

    <div>
    <input type="submit">
    </div>
    </form>

    <?php echo $resultat; ?>


</body>
</html>