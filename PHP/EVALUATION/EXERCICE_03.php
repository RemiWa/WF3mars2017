<style>
    p{
        color:#f44242;
    }
</style>

<?php

// Declaration des différents Array

    $language = array( '---', 'Français', 'Anglais', 'Italien', 'Allemand, Japonais');
    $category = array( '---', 'Sci Fi', 'Horror', 'action');

// Declaration des variables d'affichage
    $contenu="";

// Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Traitement du formulaire

if(!empty($_POST)){

    //Verification des champs

	if (strlen($_POST['title']) < 5){
		$contenu .= '<div>Le titre doit comporter au moins 5 caractères</div>';
	}

	if (strlen($_POST['actors']) < 5){
		$contenu .= '<div>Le nom de l\'acteur doit comporter au moins 5 caractères</div>';
	}

    if (strlen($_POST['director']) < 5){
		$contenu .= '<div>Le nom du réalisateur doit comporter au moins 5 caractères</div>';
	}

    if (strlen($_POST['producer']) < 5){
		$contenu .= '<div>Le nom du producteur doit comporter au moins 5 caractères</div>';
	}

	if (!(is_numeric($_POST['year_of_prod']) && checkdate('01', '01', $_POST['year_of_prod']))){
		$contenu .= '<div>L\'année de production n\'est pas valide</div>';
	}

	if (!in_array($_POST['language'], $language)){
		$contenu .= '<div>La langue n\'est pas valide</div>';
	}

    if (!in_array($_POST['category'], $category)){
		$contenu .= '<div>La catégorie n\'est pas valide</div>';
	}

    if (strlen($_POST['storyline']) < 5){
		$contenu .= '<div>Le synopsis du film doit comporter au moins 5 caractères</div>';
	}

	if (!filter_var($_POST['video'], FILTER_VALIDATE_URL)){
		$contenu .= '<div>Le lien vers la video n\'est pas valide</div>';
	}


    //On vérifie que le formulaire est rempli
	if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // securité pour contrer l'injection de caracteres speciaux'
		}
        // Préaparation de la requête

		$query = $pdo->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');

        // Affectation des valeurs
		$query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
		$query->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
		$query->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
		$query->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
		$query->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
		$query->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
		$query->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
		$query->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
		$query->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

        // Execution de la requête
		$succes = $query->execute();

        // validation du fomrulaire
		if ($succes) {
			$contenu .= '<div>Le film a été enregistré avec succés<div>';
		} else {
			$contenu .= '<div>Erreur lors de l\'enregistrement du film<div>';
		}

	}

}

?>

<!--Declaration du formulaire html-->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
</head>
<body>

    <form method="post">

        <div>
			<label for="title">Titre</label>
			<input type="text" name="title" id="title">
		</div> <br><br>

        <div>
			<label for="actors">Acteurs</label>
			<input type="text" name="actors" id="actors">
		</div><br><br>

        <div>
			<label for="director">Réalisateur</label>
			<input type="text" name="director" id="director">
		</div><br><br>

        <div>
			<label for="producer">Producteur</label>
			<input type="text" name="producer" id="producer">
		</div><br><br>

        <div>
			<label for="year_of_prod">Année de production</label>
			<select name="year_of_prod" id="year_of_prod">
            <?php
				for($i=date('Y'); $i>=date('Y')-100; $i--) {
					echo "<option value=$i>$i</option>";
				}
				?>
            </select>
		</div><br><br>

        <div>
			<label for="language">Langue</label>
			<select name="language" id="language">
            <?php
				foreach($language as $key => $value){
					echo "<option value=$value>$value</option>";
				}
				?>
            </select>
		</div><br><br>

        <div>
			<label for="category">Category</label>
			<select name="category" id="category">
            <?php
				foreach($category as $key2 => $value2){
					echo "<option value=$value2>$value2</option>";
				}
				?>
            </select>
		</div><br><br>

        <div>
			<label for="storyline">Synopsis</label>
            <textarea name="storyline" id="storyline" placeholder="storyline"></textarea>
        </div><br><br>

        <div>
			<label for="video">Video</label>
			<input type="text" name="video" id="video">
		</div><br><br>

        <div>
			<input type="submit" value="enregistrer">
		</div>

    </form>

    <p>
	<?php  echo $contenu; ?>
    </p>
</body>
</html>