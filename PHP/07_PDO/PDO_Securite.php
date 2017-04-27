<?php
//Cas pratique :  un espace de commentaires
//*************************************************

/*

Nous allons créer un espace de commentaire type avais / livre d'or
Modélisationde la bdd "dialogue":
    table : commentaire
    Champs: id_commentaire  INT(3) PK AI
            pseudo          CARCHAR(20)
            message         TEXT
            date_enregistrmeent   DATETIME

*/

$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(!empty($_POST)) {

    //Traitement contre les failles xss (injections js) ou les injections css :  On parle d'échappement des données reçues
    //Pour l'exemple on va injecter dnas le champs message, le code suivant: <style>body{display:none}</style>
    

    //ert pour autre exemple, on va injecter le code js suivant
    //<script>while(true){alert("Vous êtes bloqués");</script>

    $post['pseudo']=htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $post['message']=htmlspecialchars($_POST['message'], ENT_QUOTES); //htmlspecialchars est une fonction qui convertit les caractères spéciaux (<>, "", '', &) en entités html (par exemple le < devient &lt;) ce qui permet de rendre innoffensives les balises html. ENT_quotes permet d'ajouter les quotes à la liste des caractères converts'
    
    //en complément:
    $_POST['message']= strip_tags($_POST['message']); // prends les balises html et les supprime

    //htmlentities() permet de convertir les balises html en entités HTML


    // 1- Nous alolons faire une requete qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes:
    // $r = $pdo-> query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");

    // 2 - Nous allons faire une injection sql qui va supprimer le contenu de notre table: dans le champs message, saisire ok');DELETE FROM commentaire; (
    // Pour se prémunir des injections sql et pouvoir mettre des apostropheres, nous pouvons faire une requete prépqarée

    $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUE ( :pseudo, NOW(), :message)");

    $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
    
    $stmt->execute(); 



}// Fin du if(!empty($_POST))


?>

<!--Formulaire de saisie du message-->
<form action="" method="POST">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="message">Message</label><br>
    <textarea id="message" name="message"></textarea><br><br>

    <input type="submit" name="envoi" value="envoi">
</form>

<?php
// Affichage des messages contenus dans la BDD:
$resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d-%m-%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s')AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");

echo'<h2>'. $resultat->rowCount(). 'commentaire(s) </h2>';
while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<div>';
        echo'<p> Par '.$commentaire['pseudo'] . ' le ' . $commentaire['datefr'] . 'à' . $commentaire['heurefr'] . '</p>';
        echo '<p>' . $commentaire['message'] . '</p>';
    echo '</div><hr>';

}