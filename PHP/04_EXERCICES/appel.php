<?php

include ('fonctions.inc.php');

if ($_GET['fruit'] == 'Cerises'){
    echo calcul($_GET['fruit'], 2000);

} else if ($_GET['fruit'] == 'Bananes'){
    echo calcul($_GET['fruit'], 2000);

} else if ($_GET['fruit'] == 'Pommes'){
    echo calcul($_GET['fruit'], 2000);
    
} else if ($_GET['fruit'] == 'Peches'){
    echo calcul($_GET['fruit'], 2000);
}
?>

<?php
if (isset($_GET['fruit'])){
    echo calcul($_GET['fruit'], 2000);
} else {
    echo 'Ce fruit n\'existe pas';
}
?>