//  le Jankenpon

/*
- l'utilisateur doit choisir entre pierre feuille et ciseaux
- L'ordinateur doit choisir entre pierre feuille ou ciseaux
-Nous comparons le choix de l'utilisateur et de l'ordinateur.
-Selon le résultat, l'utilisateur a gagné ou l'ordinateur a gagné.
- Une partie se jue en 3 manches.

//  Créer une variable globale pour el choix de l'utilisateur
*/

var userBet = '';


// L'uttilisateur doit choisir entre pierre feuille et ciseaux
// créer une fonction qui prend en paramètre le choix de l'utilisateur.
// Appeler la fonction au clic sur les bouttons du DOM en précisant le paramètre
// Afficher le résultatdnas la console.

function userChoice( paramChoice ){

    // Afficher dnas la consoel al valeur de userBet
    console.log(userBet);

    // assigner à la variable userBet la valeur de paramChoice
    userBet = paramChoice;

};


// L'ordinateur doit choisir entre pierre feuille et ciseaux
//  Fonction pour déclencher le choix au clic sur un bouton
// Créer un tableau contenant Pierre feuille ciseaux
// Faire en sorte de chosir aléatoirement l'un des trois index du tableau
// Afficher le résultat dans la console

function computerChoice(){

    var computerMemory = ['Pierre', 'feuille', 'ciseaux'];


    //  Choisir aléatoirement l'un des 3 index du tableau
    var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];
    console.log( computerBet );







    // Vérifier si userBet est vide
    if( userBet == ''){
        document.querySelector('h2').innerHTML = 'Choisi ton <i>arme<i>';

    }else{

    // Afficher les deux choix dans la balise h2
    document.querySelector('h2').textContent = userBet+ ' vs. ' + computerBet;


    // comparer lles varibales
    if (userBet ==computerBet ){
        document.querySelector('p').textContent = 'égalité';

    }else if(userBet == 'pierre'&& computerBet == 'ciseaux') {
        document.querySelector('p').textContent = 'gagné';
    
    }else if( userBet== 'feuille' && computerBet=='pierre'){
        document.querySelector('p').textContent = 'gagné';

    }else if (userBet=='ciseau' && computerBet=='feuille'){
        document.querySelector('p').textContent = 'gagné';
    
    } else{
        document.querySelector('p').textContent = 'LOSER';
    }

    }

};