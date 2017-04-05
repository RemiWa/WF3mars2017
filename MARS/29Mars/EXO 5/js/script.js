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

    if (userChoice  == 'rouge') {

        // il faut que la variable suserchoice soit bien "rouge"
        console.log('rouge se dit Red en anglais');

    } else if ( userChoice == 'bleu'){

        console.log('Bleu se dit Blue en anglais' )
    } else if ( userChoice == 'vert'){

        console.log('vert se dit Green en Anglais')
    } else {

        console.log('je ne connais aps cette couleur, connard')


        // rappeler la fonction pour refaire chosiir une couleurs
        choseColor();
    };

};

