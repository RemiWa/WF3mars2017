<?php
$tab = array();
$tab['resultat'] = '';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

if($mode == 'liste_membre_connecte'){

 $prenom = file("prenom.txt");
 foreach($prenom as $valeur){
     $tab['resultat'] .= '<p>'.$valeur.'</p>';
     }
 }
echo json_encode($tab);