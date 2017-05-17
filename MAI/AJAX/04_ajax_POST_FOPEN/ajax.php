<?php

$email= "";
if(isset($_POST['email']))
{
    $email = $_POST['email'];
}

//création ou ouverture d'un ficher via la fonction fopen
//en mode a php crée le fichier s'il n'exuiste pas sinon il ne faiot que l'ouvrir
// http://php.net/manual/fr/function.fopen.php

$f = fopen("email.txt", "a");
fwrite($f, $email ."\n"); // "\n" permet un retour à la ligne

$tab = array();
$tab['resultat'] = '<h2>Confirmation de l\'inscription</h2>';

$liste = file("email.txt"); // La fonction file place chaque ligne du'n fichier précisé en argument dans un tableau array
$tab['resultat'].= '<p>voicui la liste de tous les inscrits</p>';

$tab['resultat'] .=  '<ul>';
foreach($liste as $valeur)
{
    $tab['resultat'].= '<li>'.$valeur.'</li>';

}
$tab['resultat'] .= '</ul>';

echo json_encode($tab);