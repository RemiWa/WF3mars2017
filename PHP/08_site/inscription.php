<?php
//-------------------TRAITEMENT----------------------------
require_once('inc/init.inc.php');
$inscription = false; //variable qui permet de savoir si le membre est inscrit pour ne pas réafficher le formulaire de réinscription.$_COOKIE

//Traitement du post
if(!empty($_POST)) { // Si le formulaire est posté

        //validation du formulaire:
        if (strlen($_POST['pseudo']) <4 || strlen($_POST['pseudo']) >20){
            $contenu .= '<div class="bg-danger">Le pseudo doit contenir au moins 4 caractères</div>';
        }


        if (strlen($_POST['mdp']) <4 || strlen($_POST['mdp']) >20){
            $contenu .= '<div class="bg-danger">Le mdp doit contenir au moins 4 caractères</div>';
        }

        if (strlen($_POST['nom']) <2 || strlen($_POST['nom']) >20){
            $contenu .= '<div class="bg-danger">Le nom doit contenir au moins 4 caractères</div>';
        }


        if (strlen($_POST['nom']) <2 || strlen($_POST['nom']) >20){
            $contenu .= '<div class="bg-danger">Le nom doit contenir au moins 4 caractères</div>';
        }

        if (strlen($_POST['prenom']) <2 || strlen($_POST['prenom']) >20){
            $contenu .= '<div class="bg-danger">Le prénom doit contenir au moins 4 caractères</div>';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $contenu = '<div class="bg-danger">Email est invalide</div>';
        }
        //filter var() permet de valider des formats de chaines de caractères pour valider qu'il s'agit ici d'email (on pourrait valider une rul par exemple)'

        if($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f'){
            $contenu .= '<div class="bg-danger">La civilité est incorrecte</div>';
        }


        if (strlen($_POST['ville']) <4 || strlen($_POST['ville']) >20){
            $contenu .= '<div class="bg-danger">La ville doit contenir au moins 4 caractères</div>';
        }


        // Code Postal
        if(!preg_match('#^[0-9]{5}$#',$_POST['code_postal'])) {
                $contenu .= '<div class="bg-danger">Le code postal n\'est pas valide</div>';
        }
        // explicatuion de l'expression régulière: Elle st délimitée par des # au début et à la fin. Le ^signifie que l'expression débute par tout ce qui suit. Le $ signifie que l'expression termine par tout ce qui précède.[0-9] définit l'intervale des caractèrs autorisés, ici de 0 à 9. {5} est un quantificateur qui indique qu'il faut 5 caractères autorisés.'

        if (strlen($_POST['adresse']) <4 || strlen($_POST['adresse']) >20){
            $contenu .= '<div class="bg-danger">L\' adresse doit contenir au moins 4 caractères</div>';
        }

        // SI aucune erreur sur le formulaire, on vérifie l'unicité du pseudo avant l'inscription en bdd:
        if(empty($contenu)) { //Si contenu est vide, c'est qu'il n'y a pas de message d'errerur

            $membre = executeRequete("SELECT id_membre FROM membre WHERE pseudo = :pseudo", array(':pseudo'=>$_POST['pseudo'])); //on vérifie l'existence du pseudo

            if($membre->rowCount()>0){ //s'il y a des ligne sdasn el resultat de la requête '
             $contenu .= '<div class="bg-danger">Le pseudo est indisponible, Choisissez-en un autre</div>';

            } else {
                //si le pseudo est unique, on peut faire l'inscription en bdd:
                $_POST['mdp']= md5($_POST['mdp']); //Permet d'encrypter le mt de passe selon l'algo MD5. Il faudra le faire aussi sur la page de connexion pour comparer deux mots cryptés. ( ésultats 32 caractères)

                executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)", array(':pseudo' => $_POST['pseudo'], ':mdp'=> $_POST['mdp'], ':nom'=>$_POST['nom'], ':prenom'=>$_POST['prenom'], ':email'=>$_POST['email'], ':civilite'=>$_POST['civilite'],':ville'=>$_POST['ville'], ':code_postal'=>$_POST['code_postal'], ':adresse'=>$_POST['adresse'] ));

                $contenu .= '<div class="bg-success"> Vous êtes inscrits. <a href="connexion.php"> Cliquez ici pour vous connecter</a></div>';

                $inscription = true; // pour ne plus afficher le formulaire d'inscription'

            } // fin du else de if ($membre->rowcount () > 0)

        } //fin du if (empty($contenu))

}// fin du if(!empty($_POST))

// ---------------------- AFFICHAEG------------------------------------
require_once('inc/haut.inc.php');

echo $contenu;  //affiche des messages du site
if (!$inscription) : // Si membre non inscrit, on affiche le formulaire.
?>

<h3>Veuillez renseigner le formulaire pour vous inscrire</h3>
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value=""><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value=""><br><br>

    
    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" value=""><br><br>

    <label for="civilite">civilite</label><br>
    <input type="radio" name="civilite" id="homme" value="m" checked><label for="homme">Homme</label><br>
    <input type="radio" name="civilite" id="femme" value="f"><label for="femme">Femme</label><br>
    
    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" value=""><br><br>

    <label for="code_postal">Code Postal</label><br>
    <input type="text" id="code_postal" name="code_postal" value=""><br><br>
    
    <label for="adresse">Adresse</label><br>
    <textarea  id="adresse" name="adresse"></textarea><br><br>

    <input type="submit" name="inscription" value="s'inscrire" class="btn"><br><br>
</form>

<?php
endif; //synthaxe du if avec : qui remplace la première accolade et endif qui remplace la seocnde

require_once('inc/bas.inc.php');
?>