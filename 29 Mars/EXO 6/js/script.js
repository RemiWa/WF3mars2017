// créer une fonction pour demander à tulisateur de chosir une couleur

var userChoice = ' ';
console.log ( userChoice );

function choseColor(){

    // Code à executer lorsque la fonction est appelée
    var userPrompt = prompt('Choisir une couleur entre vert rouge et bleu');

    // Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;

    // appeler la fonction de traduction
    translateColor( userChoice );


};

// Créer une foncion pour traduire les couleurs

function translateColor(paramColor) {

    // utilisation du switch
    switch(paramColor){

        // premier cas : paramColor=rouge
        case 'rouge': console.log('rouge = red'); break;

        // second cas : paramColor=bleu
        case 'bleu': console.log('bleu = blue'); break;

        // troisieme cas : paramColor=rouge
        case 'vert': console.log('vert = Green'); break;

        // Pour tous les autres cas
        default : console.log('Je ne connais aps cette couleur'); break;
    }

};

