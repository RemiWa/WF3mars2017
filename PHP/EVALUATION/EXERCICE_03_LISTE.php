<?php

// déclaration de la variable d'affichage'
$contenu = '';

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//preparation de la requete
$query = $pdo->prepare('SELECT * FROM movies');
$query->execute();

//Affichage
$contenu .= '<h1>Liste des films</h1>
			 <table border="1">';
		$contenu .= '<tr>
						<th>Titre</th>
						<th>Réalisateur</th>
						<th>Année de Prod.</th>
						<th>Plus d\'infos</th>
					</tr>';

while ($movies = $query->fetch(PDO::FETCH_ASSOC)){
		$contenu .= '<tr>
						<td>'. $movies['title'] .'</td>
						<td>'. $movies['director'] .'</td>
						<td>'. $movies['year_of_prod'] .'</td>
						<td>
							<a href="EXERCICE_03_DETAILS.php?id_movie='. $movies['id_movie'] .'">Plus d\'infos</a>
						</td>
					</tr>';
	}

$contenu .= '</table>';

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie list</title>
</head>
<body>
	<?php echo $contenu; ?>

</body>
</html>

