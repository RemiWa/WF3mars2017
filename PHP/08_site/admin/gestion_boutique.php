<?php

require_once('../inc/init.inc.php');


// -----------------Traitement-----------------------------


// 1 - Vérification Admin  
if(!internauteEstConnecteEtEstAdmin()){
    header('location:../connexion.php'); // Si le membre n'est pas admin alors on le rediriqge vers la page de connexion qui est à la racine du site '
    exit();
} 



// 7- Suppression d'un produit
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])){

    // On selectionne en base la photo pour pouvoir supprimer le fichier photo correspondant
    $resultat= executeRequete("SELECT photo FROM produit WHERE id_produit = :id_produit", array (':id_produit' => $_GET['id_produit']));

        $produit_a_supprimer = $resultat -> fetch(PDO::FETCH_ASSOC); //pas de while car un seul produit
        $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'].$produit_a_supprimer['photo']; //Chemin du fichier à supprimer

        if(!empty ($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){ //file_exists est une fonction prédéfinie
            //s'il y a un chemin de photo en base et que le fichier existe, on peu le supprimer'
            unlink($chemin_photo_a_supprimer); //supprime le fichier à supprimer
        }
        //puis suppressiondu produit en bdd
    executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array('id_produit' => $_GET['id_produit']));

    $contenu .= '<div class="bg-success">Le produit a été supprimé !</div>';
    $_GET['action'] = 'affichage'; // Pour lancer l'affichage des produits dnas le tableau html (point 6=)'

}

















// 4- Enregistrement du produit en BDD
if (!empty($_POST)) { // on peut écritre if ($_POST) car si $_POST est rempli, il vaut true, on entre dnas la condition, donc le formulaire est pposté. 

    //ici, il faudrait mettre le controle des diifférents champs du formaulaire

    $photo_bdd = ''; //ma photo subit un traitement spécifique en bdd. Cette variable contiendra son  chemin d'accès

    // 5-Traiitement de la photo :
    // echo '<pre>'; print_r($_FILES); echo '</pre>';
    if (!empty($_FILES['photo']['name'])) { //Si une image a été uploadée ($_files est rrempli)

        //on constitue un nom  unique pour la photo:
        $nom_photo = $_POST['reference']. '_' . $_FILES['photo']['name'];
        // On constitue  le chemin de la photo enregistrée en bdd:
        $photo_bdd = RACINE_SITE . 'photo/' . $nom_photo; //on obtient ici le no et le chemin de la photo depuis la racine du site

        //On constitue le chemin absolu complet de la photo depuis la racine serveur:
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;
        // echo '<pre>'; print_r($photo_dossier); echo '</pre>';

        //enregistrement du fichier photo sur le serveur
        copy($_FILES['photo']['tmp_name'],$photo_dossier); //On copie le fichier temporaire de la photo stockée au chemin indiqué par $_FILEs['photo']['tmp_name] dans le chemin $photo_dossier de notre serveur.


    }





    
    // 4 - suite de l'enregistrement en bdd:
    executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo_bdd, :prix, :stock)", array('id_produit'=> $_POST['id_produit'], 'reference'=> $_POST['reference'], 'categorie'=> $_POST['categorie'], 'titre'=> $_POST['titre'], 'description'=> $_POST['description'], 'couleur'=> $_POST['couleur'], 'taille'=> $_POST['taille'], 'public'=> $_POST['public'], ':photo_bdd'=> $photo_bdd, 'prix'=> $_POST['prix'], 'stock'=> $_POST['stock'] ));

    $contenu .= '<div class="bg-success"> Le produit a été enregistré></div>';
    $_GET['action'] ='affichage'; // On met al valeur affichage dasn $_GET['action'] pour afficher automatiquement la table html des produits plus loin dnas le script (voir le point 6)
}





// 2- Les liens affichage et ajout

$contenu .= '<ul class="nav nav-tabs">
                <li> <a href="?action=affichage">Affichage des produits</a></li>
                <li> <a href="?action=ajout">Ajout d\'un produit</a></li>
             </ul>';



// 6- affichage des produits dans le back offce
if (isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) { //si $_GET contient afficahge ou que l'on arrive sur la page pour la premire fois ($_get['action] n'existe pas)'

    $resultat = executeRequete("SELECT * FROM produit"); // on selectionnes tous les produits.

    $contenu .= '<h3>Affichage des produits</h3>';
    $contenu .= '<p>Nombre de produit(s) dans la boutique : '. $resultat->rowCount() . '</p>';

    $contenu .= '<table class="table">';
        //la ligne des entêtes
        $contenu .= '<tr>';
            for($i = 0; $i < $resultat->columnCount(); $i++) {
                $colonne = $resultat->getColumnMeta($i);
                // echo '<pre>'; print_r($colonne); echo '</pre>';
                $contenu .= '<th>' .$colonne['name'] . '</th>'; //getcolumnMeta() tretourne un array contenant notement l'indice name contenant le nom de la colonne.²'
            }
        
            $contenu .= '<th> Action </th>';
        $contenu .= '</tr>';

        //Affichage des lignes
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= '<tr>';
                // echo '<pre>'; print_r($ligne); echo '</pre>';
                foreach($ligne as $index => $data) { //$index réceptionne les indices, $data receptionne les valeurs
                    if($index == 'photo'){
                        $contenu .= '<td><img src="'.$data.'" width="70" height="70"></td>';

                    }else{
                        $contenu.= '<td>' .$data . '</td>';
                    }

                }
                $contenu .= '<td>
                                <a href="?action=modification&id_produit='.$ligne['id_produit'].'">Modifier</a> /
                                <a href="?action=suppression&id_produit='.$ligne['id_produit'].'" onclick="return(confirm(\'êtes vous certain de vouloir supprimer ce produit?\'));">Supprimer</a></td>';
            $contenu .= '</tr>';
        }
    $contenu .= '</table>';

};









// -----------------AFFichage ----------------------------
require_once('../inc/haut.inc.php');
echo $contenu;

// 3 - Formulaire html

if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')):
//Si on a demandé l'ajout du'n produit ou sa modification, on affiche le formulaire
?>

<h3>formulaire d'ajout ou de modification d 'un produit</h3>
<form action="" method="post" enctype="multipart/form-data"><!--multipart/form-data permet d'uploader un fichier et de générer une superglobale $_FILES'-->
    <input type="hidden" id="'produit" name="id_produit" value="0">  <!--Champs caché qui réceptionne l'id produit necessaire lros de la modification d'un produit existant-->
    <label for="reference">Référence</label>
    <input type="text" id="reference" name="reference" value=""><br><br>

    <label for="categorie">Catégorie</label>
    <input type="text" id="categorie" name="categorie" value=""><br><br>

    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" value=""><br><br>

    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea><br><br>

    <label for="couleur">Couleur</label>
    <input type="text" id="couleur" name="couleur" value=""><br><br>

    <label for="taille">Taille</label>
    <select name="taille">
        <option value="s">s</option>
        <option value="m">m</option>
        <option value="l">l</option>
        <option value="xl">xl</option>     
    </select>

    <label>Public</label>
    <input type="radio" name="public" value="m" checked>Homme
    <input type="radio" name="public" value="f">Femme
    <input type="radio" name="public" value="mixte">Mixte<br><br>
    
    <label for="photo">Photo</label><br><br>



       <input type="file" id="photo" name="photo"><br><br>  

       <!-- couplé avec l'attribut encrtype='multipart/form-data" de la balise <form>, le type 'file permet d'uploader un fichier (ici une photo) -->





    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" value=""><br><br>

    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value=""><br><br>

    <input type="submit" value="valider" class="btn">


</form>
<?php
endif;
require_once('../inc/bas.inc.php');








?>




