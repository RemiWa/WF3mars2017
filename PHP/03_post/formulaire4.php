
<?php
print_r($_POST).'<br>';

if (!empty($_POST) && !empty($_POST['pseudo'])){

    echo 'Pseudo : '.$_POST['pseudo'].'<br>';
    echo 'mail : '.$_POST['mail'].'<br>';
    
    } else {
        echo 'pseudo / mail non valide';
    };

?>


<?php
print_r($_POST).'<br>';

if (!empty($_POST)){ // = si le formulaire est soumis, il y a les indices correspondants aux names
    if(!empty($_post['pseudo'])){
        echo 'Pseudo : '.$_POST['pseudo'].'<br>';
    } else {
        echo 'Erreur sur le psudo <br>'
    }
        echo 'mail : '.$_POST['mail'].'<br>';


?>