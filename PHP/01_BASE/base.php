    <style>h2{font-size: 1.5rem; color: red;}</style>

    <?php

//------------------------------
echo '<h2> Les balises PHP</h2>';
//------------------------------

    ?>


    <?php 
    // Pour ouvrir un passage en php, on utilise la balise précédente
    //pour femrer un passage en phop on utlise la balise suivante
    ?>

    <!--En dehors des balises de php, nous pouvons écrir e du html-->
    <strong>Bonjour</strong>


    <?php




//------------------------------
echo '<h2> écriture et affichage PHP</h2>';
//------------------------------

    echo 'Bonjour'; // echo est une instruction qui nous permet d'effectuer un afifcahge. Les instructions se terminent par un ";"
    echo '<br>';  // On peut mettre des balises html dans  un echo, elles sont interprétées comme telles.


    Print 'nous somme Jeudi'; // print est une autre instruction d'affichage.'

    // Pour info, il existed 'autres instructions d'affichages
    //print_r();
    //var_dump();





//------------------------------
echo '<h2> Variable type / declaration / affectation</h2>';
//------------------------------
    //définition d'un variable: Un espace méméoire qui porte un nom qui permet de conserver une valeur
    //En php on déclare une variable avec le symbole "$"

    $a = 127; //Je déclare la variable a, et je lui affecte la valeur 127 --> type integer INT
    $b = 1.5; // Untype deouble pour nombre à virgule
    $a = 'une chaine de caractères'; // type string pour une chaine de caractères
    $b = '127'; // string car il est entre quotes
    $a = true;  // Type boolean qui ne rend que deux valeurs possibles : true ou false






//------------------------------
echo '<h2>Concaténation</h2>';
//------------------------------
    $x ='bonjour '; 
    $y = 'tout le monde';
    echo $x . $y . '<br>'; // point de concaténation que l'on peut traduire par "suivi de"

    echo "$x $y <br>"; // On obtient le même résultat snas concaténation (vf chapitre ulterieur)

//-----------------------------

//Concaténation lors de l'affectation

$prenom1 = 'Bruno'; //Déclaration de la variable $prenom1
$prenom1 = 'Claire'; // Ici la valeur claire écrase la valeur précédente brunos qui est contenue dans la variable.
echo $prenom1. '<br>'; // Affiche claire


$prenom2 = 'bruno';
$prenom2 .= 'claire';// On affecte la valeur claire à la variable prénom2 en l'ajoutant à ala valeur prenom1'
echo $prenom2 . '<br>'; //affiche BrunoClare


//------------------------------
echo '<h2>Guillemets et quotes</h2>';
//------------------------------

$message = "aujourd'hui";
$message = 'aujourd\'hui'; // dans les quotes on echappe les apostrophes avec l'anti slash

$txt = 'bonjour';
echo "$txt tout le monde <br>"; // ICI kles variables ssont évaluées quand elles sont présentes dans des guillements _> leur contenu est affiché
echo '$txt tout le monde <br>'; // dans des quotes simples on affiche littéralement le nomd es variables. Elles ne sont aps évaluées



//------------------------------
echo '<h2>Constantes</h2>';
//------------------------------
//une constante permet de conserver un valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script. Tres utile pour garder de manière certiane la connection à une bdd ou le chemin du tie apr ex.


define("CAPITALE", "Paris"); //Par convention, on écrit toujours le nom des constantes en MAJUSCULES
echo CAPITALE . '<br>'; // Affiche Paris

// CONSTANTE MAGIQUE

//echo __FILE__ // Affiche le chemin complet du fichier dnas lequel on est

//echo __LINE__ // Affiche la ligne à laquelle on est




//------------------------------
echo '<h2>Opérateurs arithmétiques</h2>';
//------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>'; // Affiche 12
echo $a + $b . '<br>'; // Affiche 12
echo $a * $b . '<br>'; // Affiche 20
echo $a / $b . '<br>'; // Affiche 5
echo $a % $b . '<br>'; // Affiche 0

//------
// Opérations et affectations combinées
echo $a += $b; //Affiche 12 car équivaut à $a + $b 
echo $a -= $b; //Affiche 10 car équivaut à $a - $b 
echo $a *= $b; //Affiche 20 car équivaut à $a + $b 
echo $a /= $b; //Affiche 10 car équivaut à $a + $b 
echo $a %= $b; //Affiche 0

// Incrémenter et décrémenter
$i=0;
$i++; //incrémentationde i de +1
$i --; //décréme,tation de $i de -1 (vaut 0)

$k = ++$i;  //la variable est incrémentée de 1 puis elle est affectée à $k


$k = $i++; // la variable $i est d'abord affectée a $k puis incrémentée de 1'
echo $i . '<br>'; //2
echo $k . '<br>'; //1



//------------------------------
echo '<h2>Structures Conditionelles et opérateurs de comparaison</h2>';
//------------------------------

$a = 10;
$b = 5;
$c = 2;

if ($a>$b) { // si la condition renvoie true, on exécute les accolades qui suivent, sinon
    echo '$a est bien superieur à $b <br>';
}else { // si la condition enovoie false, on execute le else.
    echo 'Non, c\'est $b qui est supérieur à $a <br>';
}


if ($a > $b && $b > $c) {  // && siginifie "et"
    echo 'les deux conditions sont vraies <br>';
}

if ($a == 9 || $b >$c) {  //l'operateur de comparaisont est == et l'opérateur ou s'écrit ||'
    echo 'ok pour une des deux conditions <br>';
} else { 
    echo 'les deux conditions sont fausses <br>';
}



//___
if ($a == 8) {
    echo 'Réponse 1 <br>';
}else if ($a != 10 ){ // Sinon si $a différent de 10, on exécute les accolades qui suivent:
    echo 'Reponse 2 <br>';
}else { // Sinon si les deux conditions précédentes sont faussses, on éxécute les accolades qui suivent:
    echo 'Réponse 3 <br>'; // On entre ici dans le esle
}


//___
if ($a ==10 XOR $b == 6) {
    echo 'Ok pour la conditon exclusve<br>'; // si les duex conditions sont vraies ou fausse en meêlm temps, nous n'entrons pas dans les accolades'
}

// Pour que la conditions s'dexecute il faut que l'une soit vraie ou alors que l'autre soit vrauie mais les deux en même tmeps



//______
//conditions ternaire est une forme contractée de la condtion
echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>'; // le ? remplace le if et le : remplace le else. SI $a vaut 10, on fait un echo du   premier string sinondu second





//______
// Différence entre le == et le ===:
$vara = 1; // integer
$varb = '1'; //string

if ($vara == $varb){
    echo 'il y a égalité en valeur entre les deux variables <br>';
}

if ($vara === $varb){
    echo ' il y a égalité en valeur ET en type de varialble<br>';
}
//avec  la présence du ===, la comparaison ne fonctionne pas car les variables ne sont pas dumême type. On compare une integer avec un string
// avec le == on ne compare que la valeur: la comparaison est donc juste

/*
= Signe d'affectaion
== Signe de comparaison en valeur
=== Comparaison en valeur et en type'
*/


//____________________
// empty() er isset() :

//empty(); Compare / teste si c'est vide (c'est à dire 0; "", NULL, FALSE, ou non défini)
// isset(); Teste si c'est défini et a une valeur non NULL'

$var1 = 0;
$var2 = '';

if (empty($var1)) echo 'On a 0, vide, ou non dééfinie <br>';
if (isset ($var2)) echo 'var2 existe bien <br>';

// Différences entre empty et isset : Si on met les valeurs en commentaire, empty reste vraii car $var n'est pas défini, alors que isset est faux car $var2 n'est pas défini

// Empty sera utilisé pour vérifier que les champs d'un formulaire sont remplis par exemple. Isset permettra de vérifier l'existence d'un indice dans un aaray avec de l'utilsier.'

// phpinfo();

//____________________________
//Entrer une valeur dans une variables sous conditions (php 7)

$var1 = isset($maVar) ? $maVar : 'valeur par défaut'; //dans ceet ternaire on affecte la valeur de $maVar à ùvar1 si ell existe. celle ci n'esite pas , donc on lui affect une valeur par défaut.$_COOKIE

echo $var1 .'<br>';

//en php 7
$var2 = $maVar ?? 'valeur par défaut'; // le ?? siginifie soit l'un , soit l'autre ou encore prend la première valeur qui existe"

$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'info';
echo $var3;


//------------------------------
echo '<h2>Conditions SWITCH</h2>';
//------------------------------

//Dans le switch ci dessous, les "case" representent les cas différents dans lesquels on peut potentiellement tomber.$_COOKIE
$couleur= 'jaune';

switch($couleur) {
    case 'bleu' : echo 'vous aimez le bleu <br>'; break;
    case 'rouge' : echo 'vous aimez le rouge <br>'; break;
    case 'vert' : echo 'vous aimez le vert <br>'; break;
    default : echo 'vous n\'aimez rien <br>';
    
} 

// Le switch compare la valeur de la variable entre parentheses à chaque "case". Lorsqu'une valeur correspond, on execute l'instruction  en regard du case puis le break qui inique qu'il faut sortir de la condition
// Le default correspond à un else : On l'execute par défaut quand aucun case ne correspond.'


if ($couleur == 'bleu')  {
    echo' vous aimez le bleu ';
} else if ($couleur == 'vert') {
    echo' vous aimez le vert ';
} else if ($couleur == 'rouge') {
    echo' vous aimez le rouge ';
}else {
    echo'Vous n`\'aimez ni le bleu, ni le rouge, ni le vert';
}











//------------------------------
echo '<h2>Fonctions predefinies</h2>';
//------------------------------

// Une fonction prédéfinie permet de réaliser un traitement spécifique qui est prévu dasn le language (ici php)

//----------------
echo '<h2>Traitement des chaines de caractères (strlen, strpos, substr)</h2>';
$email1 = 'prenom@site.fr';

echo strpos($email1, '@') . '<br>'; // indique la position du caractère @ dans la chaine  $email1
echo strpos('bonjour', '@') . '<br>';
var_dump(strpos('bonjour', 'a'));

// quand j'utilise une fonction prédéfinie, il faut dse demander quels sont les arguments à lui fournir pour qu'elles s'executent correctement, et ce qu'elle peut retourner comme résultat.
//dans l'exemple de strpos en cas de succès elle retourne une integer, en cas d'echec elle retourne un boolean false

$phrase = ' blablabla à cet endroit blablablablablabla';
echo strlen($phrase) . '<br>';


//_________________________
$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptatem alias qui cumque amet laboriosam repellendus dolore soluta! Debitis facilis voluptate, molestiae similique dignissimos, adipisci ratione suscipit pariatur inventore minima?';

echo substr($text, 0, 20) . '...<a href=""> Lire la suite </a>'; // on découpe une partie du texte et on lui concatène un lien dynamique. En cas de succès, string,e n cas d'échec, false'


//___________________________
echo str_replace('site', 'gmail' , $email1).'<br>'; //remplace 'site' par 'gmail' dans le stirng contenu dans email1



//____________________________
$message ='           HELLO world                ';
echo strtolower($message) .'<br>'; // passe le string en minuscule

echo strtoupper($message) .'<br>'; // passe le string en majuscule

echo strlen($message) . '<br>';
echo strlen(trim($message)) . '<br>'; // trim permet de supprimer les espaces au début et à la fin d'un string'





//------------------------------
echo '<h2>Gestion des dates</h2>';
//------------------------------
echo date ('d/m/Y h:i:s') . '<br>'; // affiche la date et l'heur e de linstant selon le format indiqué. On peut choisir les séparateurs
echo time(); // nombre de secondes écoules depuis le 01/01/1970 à 00:00:00 (creation théorique de UNIX)


//la fonction prédégfinie srttotime()
$dateJour = strtotime('10-01-2016'); // retourne le timestamp de la date indiquée

// La fonction strftime();
$dateFormat = strftime('%y-%m-%d', $dateJour); //transforme le timestamp donné en date selon le format indiqué ici yyyy mm dd

echo $dateFormat . '<br>';



//exemple de conversion de format de date
//Transformer 23 mai 2015 en 2015-05-23
echo strftime('%y-%m-%d', strtotime('23-05-2015'));


//transformer enn 23-05-2015
echo strftime('%d-%m-%Y', strtotime('23-05-2015'));

//cette méthode de transformation est limitée dnas le temps (2038) ... On peut donc utiliser une autre méthode avec la classe DateTime
$date = new DateTime ('11-04-2017');
echo $date->format ('y-m-d');

//dateTime est une classe que l'on peut comparer à un plan ou un modèle qui sert à construre des objets 'date'
//on construit un objet date avec le mot new en indiquant la date qui nous interesse entre parentheses. $date est donc un objet "Date"
// Cet objet beneficie de méthodes (fonctions) offertes par la calsse. Il y a entres autres la méthode format() qui permet de modifeir le format d'une date.
//pour appeler cette méthode sur l'objet date, on utilise la flèche ->



//------------------------------
echo '<h2>Les fonctions utilisateurs</h2>';
//------------------------------

//les fonctions qui ne sont pas définies dans le language sont délcarées puis exectuées par l'utilisateur
//Déclaration d'une fonction:

function separation(){
    echo '<hr>'; //Déclaration d'une simple fonction permettant de tirer un trait dans la page.
}

// apppel de la fonction par son nom
separation();


//---------------------------
// Fonctions avec arguments: les arguments sont des paramètres fournis à la fonction et lui permettent de compléter ou modifier le comportement initialement prévu.

function bonjour($qui){ // qui apparait ici pour la première fois. Il s'agit d'un variable de reception qui recoit la valeur d'un argument.  '
    return 'Bonjour ' . $qui. '<br>'; //return permet de renvoyer ce qui suit le return à l'endroit où la fonction est appelée'
    echo 'cette ligne  ne sera pas executée'; //après un return on quitte la fonction donc on execute pas le code qui suit
}

//appel de la fonction
echo bonjour('Pierre'); // on appelle la fonction en lui donnant le string 'pierre' en argument'
$prenom = 'Etienne';
echo bonjour ($prenom); //l'arument peut être une variable -- Affiche bonjour étiennt'

//-----------------------------------
//Exercicre
function appliqueTVA($nombre){
    return $nombre * 1.2;

}

//fonction TVA en donnant la possibilité de modifier le taux

function appliqueTVA2( $nombre, $taux){ //on ,ne peut pas redéclarer une fonction avec le même nom
}
    echo appliqueTVA2(5, 8); // lorsqu'une fonctuion attends des arguments, il faut obligatoirement les lui donner.'


// function meteo ($saison, $temperature){
//     echo "nous sommes en $saison et il fait $temperature °c <br>";
// }

// meteo('hiver', 2);
// meteo('printemps', 2);

// //créer une fonction météo 2 qui permet d'afficher au rpintemps
// function meteo2( $saison, $temperature){
//     if ($saison == 'printemps'){
//              echo "Nous sommes au $saison et il fait $temperature °c <br>";
//     }else{ 
//         echo" Nous sommes en $saison et il fait $temperature °c <br>";
//     }
// }


function meteo2( $saison, $temperature){
    if ($saison != 'printemps'){
        $determinent = 'en';
        }else{
        $determinent = 'au'; 
        }
        echo "Nous somme $determinent $saison et il fait $temperature °c";
}

    meteo2('été', 2);

function meteo3($saison, $temperature){
    $article = ($saison=='printemps') ? 'au' : 'en'; 
 echo "Nous sommes $article $saison et il fait $temperature degrès c <br>";
}


    meteo3('été', 2);




//--------------------------
//EXERCICE FONCTIONS

function prixLitre(){
    return rand(1000,2000)/1000; //détermine un pix aléatopire entre 1 et 2 €
}

//Ecrivez la fonction factureEssence qui calcule le prix total de votre facture d'essence en fonction du nombre de litres que vous lui donnez. Cette fonction retourne la phrase "votre facture est de x euros pour y litres d'essence' Dans cette fonction, utiliser al fonction pixLitre qui retourne le prix sdu litre d'essence.'


function factureEssence($litre){
        $totalFacture = $litre * prixlitre();
        echo "Votre facure est de $totalFacture pour $litre d'essence";
        }

factureEssence(50);





















//------------------------------
echo '<h2>Les variables locales et globales</h2>';
//------------------------------

function jourSemaine() {
    $jour = 'vendredi'; //Variable locale / interne à la fionction
    return $jour;
}

// A l'exterieur de la fonction, je suis dansl'espace global
// echo $jour; //n'affiche rien ca relle est exterieure à la fonction. Onne peut pas l'utiliser dnas l'espcae global.'
echo jourSemaine(). "<br>"; // on peut cependant récupérer la valeur de $jour gracve au return qui est au seind e la fonction et à l'appel de cette fonction'



$pays = 'France'; //variable globale

function affichagePays(){
    global $pays; // le mot clé Global permet de récupérer une variable provenant de l'espace global au sein de l'espace local de la fonction. On peut donc utiliser cette variable pays.
    echo $pays;
}

affichagePays();




//------------------------------
echo '<h2>Les structures itératives</h2>';
//------------------------------

// //boucle while  
// $i=0; // valeur de départ de la boucle
// while ($i< 3){ // tant que $i est inferieur à 3, j'exécute les accolade qui suivent'
//     echo "$i---";
    
//     $i++; // on'oublie pas d'incrémenter i pour que la boucle ne soit pas infinie. Il faut que la coditon deviennet false à un moment donné.
// }


//exercice
$i=0;


while ($i < 3){ // tant que $i est inferieur à 3, j'exécute les accolade qui suivent'
    
    if ( $i==2 ){
        echo "$i";
    } else if ($i<3){
        echo "$i ---";  
    }
     $i++; // on'oublie pas d'incrémenter i pour que la boucle ne soit pas infinie. Il faut que la coditon deviennet false à un moment donné.
}

echo '<br>';

?>

//---
//a l'aide d'une boucle while, afficher dnas un selecteur les années depuis l'année en cours - 100 ans, jusqu'à l'annnée en cour 1017 /2017

<select><?php
 $a = 1917;
 
 while ($a <= 2017) {
     echo "<option>$a</option>";
     $a++;
 }
 echo '</select>';

?>

<select><?php
 $a = date ('Y') - 100; // équivaut à 2017 - 100
 
 while ($a <= date('Y')) {  //équivaut à $a <= 2017
     echo "<option>$a</option>";
     $a++;
 }
 echo '</select>';

?>

<?php

//--------------------------
//boucle DO WHILE
//------------------------
// la boucle do While a la particularité dee ne s'exécuter au moins une fois tant que la condition de fin est vraie.$_COOKIE
echo '<br> boucle do while <br>';

do{
    echo 'un tour de boucle';
} While (false) ; // on met la condition pour executer le tour de boucle ici à la place de false. Dans ce cas pécis, on voit que l'on effectue un tour de boucle bien que la condition soit fausse.'

//notez la présence du ; à la fin de la boucle while, contrairement aux autres structures itératives.$_COOKIE


//---------------------------
//boucle for
//--------------------------

echo '<br>';
for ($j = 0; $j < 16; $j++) {  //initialisation de la valeur de départ; condition d'entrée dans la boucle; incrémentation (ou décrémentation)'
    print $j . '<br>';
}
?>

//faire un boucle qui affiche 0 à 9 sur la même ligne
<table border="1">
    <tr>
    <?php for ($k = 0; $k < 10; $k++){
        print '<td><?php $k ?></td>';
    }
    ?>
    </tR>
</table>


<!--//EXERCICE-->

<?php

//1 
for ($k = 0; $k <=9; $k++) {
    echo $k;
}


//2
echo '<table border="1">';
    echo '<tr>';
    for ($k = 0; $k <=9; $k++){
        print "<td>$k</td>";
    }
    echo '</tr>';
echo '</table>';

?>



<!--//EXERCICE-->

<?php

//1 
for ($l = 0; $l <=9; $l++) {
    echo $l;
}
?>

<?php
//2

 $m = 10;

 echo '<table border="1">';
        for ($m = 0; $m <= 9; $m++) {
        echo '<tr>';
            for ($l = 0; $l <=9; $l++){
        print "<td>$l</td>";
        }
        echo '</tr>';
    }
echo '</table>';


echo '<hr>';

//version while

 echo '<table border="1">';
   //ici on fait une bouvle pour le slignes
    $r=0;
    while ($r <10) {
        echo '<tr>';
            // ici on fait une boucle pour les colonnes
            for ($l = 0; $l <=9; $l++){
        print "<td>$l</td>";
        }
        $r++;
        echo '</tr>';
    }
echo '</table>';







// ----------------------------
// Array
// ----------------------------

//On peut stocker dans un array une multitude de valeurs, quelques soient leurs types.

    $list= array('gregoire','nathalie','emily', 'françois', 'georges'); //déclaration d'un array appelé liste contenant des prénoms'

    //echo$list; // Erreur car on ne peut pas afficher directement le contenu d'un array.
    echo '<pre>';var_dump($list);  echo '</pre>';

    echo '<pre>'; print_r($list); echo '</pre>';
// ces deux instruction d'affichage permettent d'insiquer les types de l'élément mis en argument , ainsi que son contenu. Les balises pre servent à faire une mise en forme rapide. Notez que ces deux instructions ne sont urilisées qu'en phases de deeloppement.





//Autre moyen d'affecter des valeurs dans un tableau:
$tab[]='france'; //permet d'ajouter la valeur 'france dans le tableau $tab
$tab[]='italy';
$tab[]='espagne';
$tab[]='portugal';

print_r($tab).'<br>'; // pour voir le contenu du tableau

//Pour afficher la valeur Italy qui se situe à l'indice 1, nous faisons 
echo $tab[1].'<br>'; //affiche italy

//Tableau associatif : Tableau dont les indices sont littéraux: 
$couleur= array("j" => "jaune", "b"=>"bleu", "v"=>"vert"); // On peut choisire le nom des indices.
//pour acceder à un élément du tableau associatif,:
echo 'la seconde couleur de notre tableau est le '. $couleur['b'] .'<br>'; //affiche bleu
echo "la seconde couleur de notre tableau est le $couleur[b] <br>";
// un array écrit dans des guillemets perds ses quoptes autour de son index

//---------------
// Mesurer la taille d'un array
echo 'taille du tableau : ' . count($couleur) . '<br>'; //compte le nombre d'éléments dans l'array couleur: ici 3
echo 'taille du tableau : ' . sizeof($couleur) . '<br>'; //compte le nombre d'éléments dans l'array couleur: ici 3


//---------------
//possibilité de transformer un array en string:
$chaine = implode('-', $couleur);  //omplode rassemble les éléments d'un array en une chaine séparée par le sé)parateur '-'
echo $chaine.'<br>';

$couleur2 = explode('-', $chaine); //transorme une chaine en array en séparant les éléments grâce au spéarateur indiqué.
print_r($couleur2);


//----------------
echo '<h2>La boucle for each pour parcourir les array</h2>';
// La boucle foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les array et les objets. Et elle a l'avantage d'être automatique, s'arrêtant quand il n'y a plus d'éléments.$_COOKIE

foreach($tab as $valeur){ // la variable $valeur (que l'on appelle comme on veut récupère à chauqe tour de boucle les valeurs qui sont parcourures dans l'array $tab)/ La foreau parcour l'array $tab par ses valeurs]'
echo $valeur.'<br>';
}

foreach($tab as $indice => $valeur){ // on parcours l'array $tab par ses indices auquel on associe les valeurs'  quand il y a deux variables, la premiere parcours la colonne des indices, et la seconde la colonne des valeurs. Ces variables peuvent avoir n'importe que l nmbre'
    echo $indice. ' correspond à '. $valeur. '<br>';
}

//--------------------------------






//-----------------------------------
echo '<h2>les arrays multidimensionnels</h2>';
//-----------------------------------
//nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représnte une dimension.$_COOKIE

//Creation du tableau multidimensionnel:
$tab_multi = array(
    0 => array('prénom' => 'julien', 'nom' =>'dupont' , 'téléphone' => '0606060606'),
    1 => array('prénom' => 'nicolas', 'nom' =>'durant' , 'téléphone' => '0606060606'),
    2 => array('prénom' => 'Pierre', 'nom' =>'dupuis' , 'téléphone' => '0606060606'),

);
echo '<pre>'; print_r($tab_multi); echo '</pre>';

//Pour accéder à la valeur Julien:

echo$tab_multi[0]['prénom']. '<br>';  //Affiche Julien :  Nous entrons d'abord à l'indice 0 pour aller ensuite dans l'autre tableau à l'indice 'prénom' (prénom est un string)

// PArcourir le tableau multidimentsioennel avec une boucle fro
for ($i=0; $i< count($tab_multi); $i++) {
    echo  $tab_multi[$i]['prénom'].'<br>';
}


// en passant par l'indice'
foreach ($tab_multi as $i =>$valeur){
    echo $tab_multi[$i]['prénom'];
}

// En passant par la valeur
foreach ($tab_multi as $valeur){
    echo $valeur['prénom'];
}



//-----------------------------
echo'<h2> les inclusions de fichiers </h2>';
//-----------------------------


echo 'Première inclusion';
include ('exemple.inc.php'); //on inclut le fichier dont le chemin est spécifié ici

echo '<br> Deuxième inclusion'; // avec le once, on vérifie d'abord si le fichier n'est pas inclus avant de faire l'inclusion (évidte par exemple de redéclarer des fonctions en incluant 2 fopis le même fichier)  i '
include_once('exemple.inc.php');

echo '<br>Troisième inclusion';
require('exemple.inc.php'); //require fait la même chose que include, mais génère une erreur de type fatale s'il ne parvient pas à inclue le fichier qui interrompt l'executio du script. En revanche le include génère une erreuur de type warning danas ce cas, ce qui n'interrompt pas l'execution du script'

echo '<br>Quatrième inclusion';
require_once('exemple.inc.php');  //avec le once on véréife d'abord si le fichier n'est pas déjà inclus avant de faire l'inclusion

//le ".inc" du nom du fichier inclusest là à titre indicatif pour préciser qu'il s'agit d'un fichier inclus et non pas d'un fichier directement utilisé'


//**********************************************************************************************************************************

//-----------------------------
echo '<h2> introduction aux objets </h2>';
//-----------------------------

// Un objet est un autre type de donénes. Un objet est issu d'une classe qui possède des attributs et des méthodes (équivalentes à des fonctions).
// L'objet crée à partir d'une classe peut accéder à ses attributs et ces méthodes.

// exemple avec un personnage de type 'étudiant'
class Etudiant { //par convention, les classe s'écrivent avec une majuscule
    public $prenom = 'julien'; //public pour préciser que l'élément est accessible partout et donc en dehors de la classe.
    public $age = 25; //$age est un attribut ou propriété
    public function pays() {  //methode appelée Pays
        return 'France';
    }

}


$objet = new Etudiant(); // new permet de créer un nouvel objet. On instancie la classe étudiant en un objet appelé $objet.

echo '<pre>'; print_r($objet); echo '</pre>';  // On regarde le contenu de $objet, on voit son type et la classe dont il est issu

//Afficher le prénom de l'étudiant $obet:
echo $objet -> prenom . '<br>';


// Afficher le pays via la methode pays():
echo $objet -> pays() . '<br>'; // on appelle la méthode pays() avec les parenthèses : elle nous retourne 'France

// Sur un site, une classe panier contiendra les propriétés et les méthodes necessaires au fonctionnement du panierd 'achat

//-- 
//Contexte : Sur un sit, une classe Panier contiendra les proprétés et les methodes nécessaires au fonctionnement du panie d'achat:
Class Panier{
    public function ajout_article($article) {
        //instructions aui ajoute le produit au panier
        return "l'article $article a bien été ajouté au panier <br>";
    }
}

// Lorsque l'on clique sur le boutopn ajout au panier:
$panier = new Panier(); //on crée un panier vide dans un premier temps
echo $panier -> ajot_article('Pull'); // on ajoute un Pull au panier en appellant la methode ajout_article








?>



