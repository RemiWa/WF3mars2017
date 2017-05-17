<?php

//déclaraion de la variable d'affichage
$contenu = "";

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Détails du film selectionné

if(isset($_GET['id_movie'])){

	$query = $pdo->prepare('SELECT * FROM movies WHERE id_movie = :id_movie');
	$query->bindParam(':id_movie', $_GET['id_movie'], PDO::PARAM_INT);
	$query->execute();
	$movie = $query->fetch(PDO::FETCH_ASSOC);

	$contenu .= '<h1>Détail d\'un film</h1>';
	if (!empty($movie)) {
		$contenu .= '<p>Titre : '. $movie['title'] .'</p>';
        $contenu .= '<p>Acteurs : '. $movie['actors'] .'</p>';
		$contenu .= '<p>Réalisateur : '. $movie['director'] .'</p>';
		$contenu .= '<p>Producteur : '. $movie['producer'] .'</p>';
		$contenu .= '<p>Année de Prod : '. $movie['year_of_prod'] .'</p>';
		$contenu .= '<p>Langue : '. $movie['language'] .'</p>';
		$contenu .= '<p>Catégorie : '. $movie['category'] .'</p>';
		$contenu .= '<p>Synopsis : '. $movie['storyline'] .'</p>';
		$contenu .= '<p>Lien : '. $movie['video'] .'</p>';


	} else {
		$contenu .= '<div>Ce film n\'existe pas</div>';
	}

}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie details</title>
</head>
<body>
	<?php echo $contenu; ?>
    <a href="EXERCICE_03_LISTE.php">Revenir à la liste</a>
</body>
</html>
