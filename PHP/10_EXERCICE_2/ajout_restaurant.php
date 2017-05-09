<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.

	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
//déclarer la variable de l'affichage '
$contenu = '';
$type = array('----', 'gastronomique', 'brasserie', 'pizzeria', 'autre');

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


if(!empty($_POST)){

	if (strlen($_POST['nom']) < 2  || strlen($_POST['nom']) > 20){
		$contenu .= '<div>Le nom doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['adresse']) == 0 || strlen($_POST['adresse']) > 255){
		$contenu .= '<div>L\'adresse est incorrecte</div>';
	}

	if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
		$contenu .= '<div>Le téléphone doit comporter 10 chiffres</div>';
	}

	if (!in_array($_POST['type'], $type)){
		$contenu .= '<div>Le type de restaurant n\'est pas valide</div>';
	}

    if (!is_numeric($_POST['note']) || $_POST['note'] > 5 || $_POST['note'] < 0) {
		$contenu .= '<div> La note doit être comprise entre 0 et 5</div>';
	}

	if (strlen($_POST['avis']) < 0){
		$contenu .= '<div>L\'avis ne peut être vide</div>';
	}



if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // securité pour l'injection de caracteres speciaux' "echappement des données"
		}

$query = $pdo->prepare('INSERT INTO restaurant (nom, adresse, telephone, type, note, avis) VALUES (:nom, :adresse, :telephone, :type, :note, :avis )');

		$query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$query->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
		$query->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
		$query->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
		$query->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);

		$ok = $query->execute();

		if ($ok) {
			$contenu .= '<div>Le restaurant a été enregistré avec succès<div>';
		} else {
			$contenu .= '<div>Erreur lors de l\'enregistrement<div>';
		}

	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Restaurant</title>
</head>
<body>

	<form method="POST" action="">
		<div>
		<label for="nom">Nom</label>
		<input type="text"  id="nom" name="nom">
		</div>

		<div>
		<label for="adresse">Adresse</label>
		<textarea name="adresse" id="adresse" placeholder="adresse"></textarea>
		</div>

		<div>
		<label for="telephone">Téléphone</label>
		<input type="text" name="telephone" id="telephone">
		</div>

		<div>
		<label for="type">type</label>
		<select name="type"><?php
				foreach($type as $key => $value){
					echo "<option value=$value>$value</option>";
				}
				?>
		</select>
		</div>


		<div >
			<label for="note">Note</label>
			<select name="note">
			<?php
				for($i == 0; $i <=5; $i++) {
				echo "<option value=$i>$i</option>";
				}
				?>
			</select>
		</div>

		<div>
		<label for="avis">Avis</label>
		<textarea name="avis" id="avis"></textarea>
		</div>

		<input type="submit" value="enregistrer">


	</form>

	<?php echo $contenu ?>


</body>
</html>