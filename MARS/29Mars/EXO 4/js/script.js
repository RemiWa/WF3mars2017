//  demander à son utilisateur de choisir une couleur aprmi trouge vert et bleu

var userChoice = prompt('Choisir une couleur entre rouge, vert ou bleu')
console.log( userChoice );
console.log (userChoice === 'rouge' );

// Si userChoice est égale à 'rouge'
if (userChoice  == 'rouge') {

    // il faut que la variable suserchoice soit bien "rouge"
    console.log('rouge se dit Red en anglais');

} else if ( userChoice == 'bleu'){

    console.log('Bleu se dit Blue en anglais' )
} else if ( userChoice == 'vert'){

    console.log('vert se dit Green en Anglais')
} else {

    console.log('je ne connais aps cette couleur, connard')

};