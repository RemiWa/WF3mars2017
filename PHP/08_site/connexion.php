<?php

require_once('inc/init.inc.php');



//---------------------------------------------------TRAITEMENT -----------------------------------------------------------

// Déconnexion demandée par l'internaute:
// ....
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    // si l'internaute demande la déco, on détruit sa session
    session_destroy();
}



// Internaute déjà connecté:
if (internauteEstConnecte()){// Si l'internaute est déjà connecté, il n'a rien à faire ici, on le redirige donc vers son profil.
    header('location:profil.php'); // demande et redirige vers la page profil.php_ini_loaded_file
}

//traitement du formulaire de connexion et remplissage de al session:
if(!empty($_POST)){
    //Controle des champs du formulaire
     if (empty($_POST['pseudo'])){
        $contenu .= '<div class="bg-danger">Le pseudo est requis</div>';
        }


     if (empty($_POST['mdp'])){
        $contenu .= '<div class="bg-danger">Le mdp est requis</div>';
        }

     // SI le formulaire est correct, on contrôle les identifiants:
     if (empty($contenu)){
        $mdp = md5($_POST['mdp']); //on crypte le mdp pour comparer avec celui de la bdd

        $resultat =  executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo'=>$_POST['pseudo'], ':mdp'=> $mdp));

        if ($resultat->rowCount() != 0) { //s'il ya un enregistrement dans le résultat,c 'est que le pseudo et mot de passe corresponent}
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); //pas de while car il n'y a qu'un seul pseudo de même nom (ils son uniques)
            // echo '<pre>'; print_r($membre); echo'</pre>';


            $_SESSION['membre'] = $membre; //Nous remplissons la sessiona evc des éléments provenants de la bdd. Cette session permet de conserver les infos du membre dans l'ensemble du site.$_COOKIE
            
            header('location:profil.php'); // le membre étant connecté, on le renvoit vers on profil.
            exit(); 
        } else{
            //si les identifiants ne correspondent pas ,on affiche un message d'erreur:
            $contenu.= '<div class="bg-danger">Erreur sur les identifiants</div>';
        }

    }

}
















//---------------------------------------------------AFFIC§HAGE -----------------------------------------------------------

require_once('inc/haut.inc.php');
echo $contenu;
?>


<h3>Veuillez renseigner vos identifiants pour vous connecter</h3>

<form action="" method="post">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <input type="submit"  value="s'inscrire" class="btn"><br><br>


</form>



<?php
require_once('inc/bas.inc.php');

?>