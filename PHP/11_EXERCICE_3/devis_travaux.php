<?php
/*
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.

	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.".

*/
// Creation de la fontion


function prix ($montantMaison, $dateMaison){

	$taux= array(10, 20);
	$textRemise = '';

	if ($periode =='plusDeCinq'){
		$tva = $taux[0];
	}else{
		$tva = $taux[1];
	}

	$montantTTC= $montantMaison * (1 + $tva/100);

	if ($codeRemise == 'abc'){
		$montantTTC = 0.9 * $montantTTC; //applique 10% de réduction
		$textRemise = ", et y compris une rmeise de 10%";
}






//Traitement du formulaire
$contenu='';
$calculttc='';

if(!empty($_POST)){

	if (is_numeric($_POST['montantMaison']) <= 0) {
		$contenu.='<div> Le montant HT de votre maison doit être positif</div>';
	}

	 if($_POST['dateMaison'] != 'plusCinq' && $_POST['dateMaison'] != 'moinsCinq'){
		 $contenu.= '<div> Vous devez selectioner une période de construction<div>';
	 }

	  if(empty($contenu)) {
		$montantTTC = prix($_POST['montantMaison'], $_POST['dateMaison']);
	 };
}
?>


<!DOCTYPE html>
<html lang="Fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Exercice</title>
</head>
<body>
	<h1>Votre Devis de Travaux</h1>
	<form method="POST" action="">
		<div>
			<label for="montantMaison">Montant de la maison HT</label>
			<input type="text" name="montantMaison" id="montantMaison">
		</div> <br><br>


		<div>
			<label for="dateMaison">Date de contruction de la maison</label>
			<input type="radio" name="dateMaison" id="plusDeCinq" value= 'plusDeCinq' checked >Plus de 5 ans
			<input type="radio" name="dateMaison" id="moinsDeCinq" value= 'moinsDeCinq'  >5 ans ou moins
		</div> <br><br>

		<input type="submit" value="calculer">

	</form>

	<?php echo $contenu ?>
	<?php echo $calculttc ?>
</body>
</html>