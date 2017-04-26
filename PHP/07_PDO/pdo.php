<?php

//***********************
// P D O
//***********************
// L'extension PDO qui signifie PHP data object (PDO) définie une interface pour accéder à une base de donénes depuis PHP.


//****************************
// 01. C O N N E X I O N
//****************************

echo'<h1> 01. COnnexion </h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//$pdo est un objet issu e la classe prédéfinie PDO : Il représent la connexion à la BDD

//les arguments passé à PDO : 
    //- driver + serveur + nom de la BDD
    //- Pseudo du SGBD
    //-MDP du sgbd
    //-options: option 1 pour génrer l'affichage des erreurs , option 2: commande à exécuter lors de la connexion au serveur défini le jeu de caractères des échanges avec la BDD'

print_r($pdo);
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; //permet d'afficher les méthodes disponibles dans l'objet $PDO





//********************************************
// 02. Exec() avec INSERT, UPDATE, et DELETE
//********************************************

echo'<h1> 02. Exec() avec INSERT, UPDATE, et DELETE</h1>';

// $resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Dupont', 'm', 'Informatique', '2017-04-25', 300)");
// echo "Nombre d'enrgistrement affectés par l'insert : $resultat <br>";

// Exec() est utimisé pour formuler des requêtes ne retournant pas de jeu de résultats: INSERT, UPDAT, et DELETE

//                      Valeur de retour: 
//                      En cas de succès, un integer correspondant au nombre de ligne affectés
//                      En cas d'echec, cela renvoit false;'

//echo "Nombre d'enregistrements affecté spar l'INSERT : $resultat <br>";
echo 'Dernier id généré : ' . $pdo->lastInsertId();


//-----------------
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
echo "Nombre d'enregistrements affecté spar l'UPDATE : $resultat <br>";





//********************************************
// 03. query() avec SELECT + fetch
//********************************************
echo'<h1> 03. query() avec SELECT + fetch</h1>';


$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
// avec query: $result est un objet issu de la classe prédéfinie PDOstatement

/*
Au contraiire d'exec, query() est utilisé pour la formulation de requetes retournan un ou lusieurs resultats : SELECT
Valeur de retour: En cas de succès: objet PDOstatement
                  En cas d'echec: un false'

                  Avec Query, on peut aussi utiliser INSERT, DELETE et update;
*/

echo '<pre>'; print_r($result); echo '</pre>'; 
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';

//$result constitue le résultat de la requête sous forme dinexploitable directement: il faut donc le transofrmer par la methode FETCH()
$employe = $result->fetch(PDO::FETCH_ASSOC); // la methode fetch() permet de transoformer l'objet result en un array associatif exploitable, indexé avec le nom des champs de la requete


echo '<pre>'; print_r($employe); echo '</pre>'; 
echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

//Ou encore faire un fetch() selon l'une des methodes suuivantes:
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_NUM); // pour obtenir un array indexé numériqumenet
echo '<pre>'; print_r($employe); echo '</pre>'; 
echo $employe[1]; // on accède au prénom par l'indice 1 de l'array $employé

$employe = $result->fetch(); //Pour un melange de fetch_assoc et fetch_num
echo '<pre>'; print_r($employe); echo '<pre>';


//---------
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_OBJ); // retourbe un nouvel objet avec les noms de champs comme propriété (=attribut) public.$_COOKIE
echo '<pre>'; print_r($employe); echo '<pre>';
echo $employe->prenom; //affiche la valeur de la propriété prenom de l'objet $employ'


    //attention, il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de resultats. Vous ne pouvez pas faire plusieurs fetch sur le même résultat contenant une seule ligne.$_COOKIE
    //En effet, cette ùéthode déplace un curseur de lecteure sur le résultat suivant contenu dans le jeu de résultat: ainsi quand il n'yen a qu'un seul, on sort du jeu.

//Exercicie :: afficher le service de l'employée Laura selon 2 methodes différentes de notre choix'


$result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
$employe = $result->fetch(PDO::FETCH_ASSOC);
echo $employe['service']; 

$result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
$employe = $result->fetch(PDO::FETCH_NUM); // pour obtenir un array indexé numériqumenet
echo $employe[0];


//1 Connexion - new PDO
//2 requete -- PDO statement
// 3 fetch -- array / objet exploitable
//4 echo / print 




//********************************************
// 04. While et fetch_assoc
//********************************************
echo'<h1> 04. While et fetch_assoc</h1>';

$resultat = $pdo->query("SELECT * FROM employes");
echo 'Nombre d\'employés : ' .$resultat->rowCount() . '<br>'; // permet de compter le nombre de ligne retournées par la requete

while ($contenu = $resultat -> fetch(PDO::FETCH_ASSOC)) { //fetch retourne la ligne suivante du jeu de résultats en array associatif. La boucle while permet de faire avancer le curseur dans l ejeu de résultats, et s'arrête quand il est à la fin des résultats.

    // echo '<pre>'; print_r($contenu); echo '<pre>'; //on voit que $contenu est un array associatif qui contient les données de  chaque lignes du jeu de résultats. Les noms des indices correspondent aux nombres des champs.
    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['nom'] . '<br>';
    echo $contenu['date_embauche'] . '<br>';
    echo $contenu['service'] . '<br>';
    echo $contenu['salaire'] . '<br>';
    echo '-----------------<br>';
}

// Quand on fait une requête qui ne sort qu'un seul résultat : pas de boucle while, mais fetch() seul
// Quand on a plusieurs résultats dans la requête, on fait une boucle while pour parcourir tous les résultats'





//********************************************
// 05.fetchAll
//********************************************
echo'<h1> 05. fetchALL</h1>';

$resultat = $pdo->query("SELECT  * FROM employes");
$donnees = $resultat->fetchALL(PDO::FETCH_ASSOC); //retourne toutes les lignes de resultats dasn un array multidimensionnel sans faire de boucle : on a un array associatif à chaque indice numérique. Marche aussi avec FETCH_NUM


// echo '<pre>'; print_r($donnees); echo '<pre>';
//pour lire le contenu d'un array multidimensionnel, nous faisons des boucles foreach imbriquées:

foreach ($donnees as $contenu){
    foreach ($contenu as $indice => $valeur){ //$contenu est un sous array associatif. On parcours donc chaque sous array 
        echo $indice . ' correspond à '. $valeur . '<br>';
    }
    echo '-----------------<br>';
}


?>








<?php
//********************************************
// 06. EXERCICE
//********************************************
echo'<h1> 06. EXERCICE</h1>';

//afficher la liste des bdd présentes sur le sgbd dans une list ul /li
// pour mémoire la requete sql est SHOW DATABASES

$resultat2 = $pdo->query("SHOW DATABASES");

echo'<ul>';
$bdd = $resultat2->fetchALL(PDO::FETCH_ASSOC);

foreach ($bdd as $bddCont){
    foreach ($bddCont as $bddName => $bddValeur){
    echo '<li>'. $bddValeur .'</li>';
    }
}
echo'<ul>';

echo '<ul>';
while($donnees = $resultat2->fetch(PDO::FETCH_ASSOC)){
    echo'<li>';
        echo $donnees['Database'];
    echo'</li>';
}
echo '</ul>';







//********************************************
// 07. Table HTML
//********************************************
echo'<h1> 07. Table HTML</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border = "1">';
    // Affichage de la ligne d'entête
    echo '<tr>';
    for($i = 0; $i < $resultat->columnCount(); $i++){
        echo '<pre>'; print_r($resultat ->getColumnMeta($i)); echo '</pre>';//pur voir ce que retourne la méthode getColumnMeta: au array avec notemment l'indice name qui contient le nom du champs
    
        $colonne = $resultat->getColumnMeta($i); //$colonne est un array qui contient l'indice name
        echo '<th>'. $colonne['name']. '</th>'; // l'indice name contient le nom du champs'
    }
    echo'</tr>';

    //affichage des autres lignes
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        foreach($ligne as $information) {
            echo'<td>' .$information . '</td>';
        }
    echo '</tr>';
    }

echo '</table>';




//********************************************
// 08. Requetes préparées prepare + bindParam() + execute()
//********************************************
echo'<h1> 08. requetes préparées</h1>';

$nom = 'sennard';

//préparation de la requête:
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); //on prépare la requ^^ete snas l'executer avec un marqueru nominatif écrit :nom'

// on donne une valeur au marqueru :nom
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // je lie le marqueur :nom à la variable $nom. Si on change le contenu de la variable, la valeur du marqueur changera automatiquement si on fait pluseurs execute

//on execute la requete:
$resultat -> execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); //$donnees est un array asociatif
echo implode($donnees, '_'); //implode transfrome l'array en string'

/*
Prepare() renvoie toujours un objet PDOSTATEMENT
execute() renvoie:
                en cas de succès un pdostatement
                en cas d'échec un boolean false
les requête préparées sont à préconiser si on eécute plusieurs fois la même requête 'par exemple dans uen boucle) et ainsi éviter le cycle complet analyse / Interpréation / execution de la requête.

Par ailleurs les reque^tes préparées sont souvent utilisées pour assainir les données en forcant le type des valeurs communiquées au marqueurs.
*/



//********************************************
// 09. Requetes préparées prepare() + bindValue() + execute()
//********************************************
echo'<h1> 09. Requetes préparées prepare() + bindValue() + execute()</h1>';

$nom = 'Thoyer';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); //on prépare la requ^^ete snas l'executer avec un marqueru nominatif écrit :nom'

$resultat->bindValue(':nom', $nom, PDO::PARAM_STR); // je lie le marqueur à une valeur. Si celle cic change, il faudra refaire un bindValue pour prendre en compte la nouvelle valeur lors d'un prochain execute.'
$resultat -> execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); //$donnees est un array asociatif
echo implode($donnees, '_'); //implode transfrome l'array en string'

// Si on change la valeur de $nom sanas faire un nouveau bindValue, le marqueur :nom de la requête pointe toujours sur la veleur définie au début (Thoyer).
$nom = 'durand';
$resultat -> execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); //$donnees est un array asociatif
echo implode($donnees, '_'); // on obtient toujours les informations de thoyer et non pas de Durantd




//********************************************
// 10 . Exercice
//********************************************
echo'<h1> 10 exercice</h1>';
// Après avoir importé la bdd 'bibliotheque', affichz les livres empruntés par chloé, en utilisant une requete préparée.$_COOKIE
// $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $prenom = 'chloe';
// $resultat = $pdo->prepare("SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE id_abonne IN( SELECT id_abonne FROM abonne WHERE prenom = :nom))");

// $resultat->bindParam(':nom', $prenom, PDO::PARAM_STR); 
// $resultat -> execute();

// while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
//         echo implode($donnees, '_'); 
// }

// //correction
// $pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// $resultat = $pdo->prepare("SELECT titre FROM livre l INNER JOIN emprunt e ON e.id_livre = l.id_livre INNER JOIN abonne a ON a.id_abonne = e.id_abonne WHERE a.prenom = :prenom))");

// $prenom = 'chloe';
// $resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR); // on peut aussia voir PDO::PARAM_INT ou PDO::PARAM_BOOL
// $resultat -> execute(); //on obtient un objet issude la classe prédéfinie PDOStatement (=1 résultat de requête)

// // 3- le fetch:
// echo '<ul>';

// while($livre = $resultat->fetch(PDO::FETCH_ASSOC)) {
//     echo '<li>';
//     echo $livre['titre'];
//     echo '</li>';
// }
// echo '</ul>';





//********************************************
// 11. FETCH CLASS
//********************************************
echo'<h1> 11 FETCH CLASS</h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

class employes {
            public $id_employes;
            public $prenom;
            public $nom;
            public $sexe;
            public $service;
            public $date_embauche;
            public $salaire; // on déclare autant de propriétés qu'il y a de champs dans la table employes. L'orthographe des propriétés doit être identique à celle des champs
}


$result = $pdo->query("SELECT * FROM employes");

$donnees = $result->fetchAll(PDO::FETCH_CLASS, 'employes'); //on obtient un array multidiemensionnel indicé numériquement qui contient à chaque indice un objet issu de la classe employé
echo '<pre>'; print_r($donnees); echo '</pre>';

//on affiche le contenu de $donnes avec une boucle foreach
foreach ($donnees as $employe) {
    echo $employe->prenom . '<br>';
}




//********************************************
// 12. Points complémentaires
//********************************************
echo'<h1>12 Points complémentaires</h1>';

//--------------
echo '<strong> Le marqueur "?"</strong><br>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?"); //on prépare dans un premier temps la requête sans sa partie variable que l'on représente avec des marqueurs sous forme de ?"'

$resultat -> execute(array('durand', 'damien')); //Durand va remplacer le premier point d'interrogation et Damien le second'

$donnees = $resultat -> fetch(PDO::FETCH_ASSOC); //pas de boucles while car on sait qu'il n'y a qu'un seul résultat dans cette requête.
echo implode($donnees, '_'); // notez quie nous faisons un implode ici pour aller plus vite et éviter de faire un affichage dans une boucle.



//--------------
echo '<strong>On peut faire un execute() sans bindParam</strong><br>';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom"); //on prépare dans un premier temps la requête sans sa partie variable que l'on représente avec des marqueurs sous forme de ?"'

$resultat -> execute(array('nom' => 'durand', 'prenom' => 'damien')); // notez que nous ne sommes pas obliggés de mettre les ":" devant les marqueurs
$donnees = $resultat -> fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '_');





//********************************************
// 13. Afficher une erreur de requêtes
//********************************************
echo'<h1>13 Afficher une erreur de requête sql</h1>';

$resultat = $pdo->prepare("SELECT * FROM azerty WHERE nom = 'durand'");
$resultat-> execute();
echo '<pre>'; print_r($resultat->errorInfo()); echo'</pre>'; //errorInfo est une method qui appartient à l aclasse pdoStatement et qui fournit des infos sur l'erreur sql eventuellement produite. On trouve le message de l'erreuur à l'indice 2 de l'array retourné par cette methode.



//********************************************
// 14. MySQLi
//********************************************
echo'<h1>mySQLi</h1>';


// il existe une autre manière de se connecter à une base de données et d'effectuer des requêtes sur celle ci :l'extension Mysqli.
//Connexion à la bdd:
$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');

//un exemple de requete
$requete = $mysqli->query("SELECT  * FROM employes");

// Notez que les objets  $mysqli(issus de la classe prédéfinie Mysqli) et requête issu de la classe Mysqli_result ont des propriétés et des méthodes différentes de pdo. Donc, nous ne pouvons pas les mélanger les uns avec les autres.


?>