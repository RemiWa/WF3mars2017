// Ajouter une balise dans le DOM
//  - Selectionner le dcument
//  Appliquer la fonction write
// Ajouter el contenu

document.write('<p>Je suis généré en JavaScript</p>');

var usersArray = ['Thurston', 'Kim', 'Lee', 'Remi' ];
for ( var i=0; i<usersArray.length; i++){

    document.write('<p>Salut '+ usersArray[i] + '</p>');

};