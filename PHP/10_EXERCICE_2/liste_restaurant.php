<?php

/*

 1- Afficher dans une table HTMl la liste des restaurants avec les champs nom et téléphone et un champs spplémentair "autres infos" avec un lien qui permet d'afficher le détail de chaque contacts.$_COOKIE
 2 - Afficher sous la table html le détail d'un contact quand on clique sur le lien autre infos

*/


$contenu = '';

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->prepare('SELECT * FROM restaurant');
$query->execute();


        $contenu .= '<h1>Liste des restaurants</h1>';
		$contenu .= '<table border="1">';
		$contenu .= '<tr>
						<th>Nom</th>
						<th>Téléphone</th>
						<th>Autres infos</th>
					</tr>';
while ($restaurants = $query->fetch(PDO::FETCH_ASSOC)){

        $contenu .= '<tr>
                    <td>' .$restaurants['nom'].'</td>
                    <td>' .$restaurants['telephone'].'</td>
                    <td><a href="?id_restaurant=' .$restaurants['id_restaurant'].'">Autres Infos</a></td>
                    </tr>';

        $contenu .= '</table>';

        if(isset($_GET['id_restaurant'])){

            $query = $pdo->prepare('SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant');
            $query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);
            $query->execute();
            $infos = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($infos)){
            $contenu .= '<p>Nom : '. $restaurants['nom'] .'</p>';
            $contenu .= '<p>Téléphone : '. $restaurants['telephone'] .'</p>';
            $contenu .= '<p>Adresse : '. $restaurants['adresse'].' </p>';
            $contenu .= '<p> Avis : ' . $restaurants['avis'].' </p>';
            $contenu .= '<p> Note : ' .$restaurants['note'].' </p>';
            $contenu .= '<p> type : ' .$restaurants['type'].' </p>';

            } else {
                $contenu .= '<div>Ce restaurant n\'existe pas</div>';
            }

        }

    }








?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste des restaurants</title>
</head>
<body>
	<?php echo $contenu; ?>
</body>
</html>