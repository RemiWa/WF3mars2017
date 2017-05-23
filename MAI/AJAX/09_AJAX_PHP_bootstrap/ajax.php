<?php
require_once('inc/init.inc.php');

$tab = array();
$tab['resultat'] = "";

$mode = isset($_POST['mode']) ? $_POST['mode'] : "";

if ($mode == 'enregistrer')
{
    if(!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu']))
    {
        $resultat = $pdo->prepare("INSERT INTO article (titre, auteur, contenu, date) VALUES (:titre, :auteur, :contenu, Now())");
        $resultat->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat->bindParam(':auteur', $_POST['auteur'], PDO::PARAM_STR);
        $resultat->bindParam(':contenu', $_POST['contenu'], PDO::PARAM_STR);
        $resultat->execute();
        $tab['resultat'].= '<div class="alert alert-success" role="alert"> Article enregistré </div>';

    };
;}

elseif($mode == 'liste'){
    //récupérer tous les articles et les palcet dens $tab['resultat']
    //mettre en place une fonction ajax qui envooie l'argument mode=liste et qui affiche les articles dans l'élétment dans l'id liste'
    $liste_article = $pdo->query("SELECT id_article, titre, auteur, contenu, date_format(date, '%d-%m-%Y à %H:%i:%s') as date_fr FROM artcile ORDER BY date DESC");

    while($article = $liste_article ->fetch(PDO::FETCH_ASSOC)){
        $tab['resultat'].= "<div class='col-sm-4'>";
    }
}

echo json_encode($tab);