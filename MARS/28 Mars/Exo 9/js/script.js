var user = 'Remi Warin';

// créer une variable de type ARRAY

var myArray = [ "Texte", 1979, true, user ];

// Afficher le tableau dans al console
console.log( myArray );

// afficher al taille du tableau
console.log( 'la taille du tableau est ' + myArray.length );

// zfficher le premier index de mon tableau (ou un des index du tableai)
console.log ( myArray[0]);
console.log ( myArray[1]);

// Ajouter un index dans le tableau
// Pour ajouter une valeur dasn un tableau, on utilise une fonction push
myArray.push( 'une valeur en plus');

// Supprimer et remplacer des index de type tableau
myArray.splice( 2, 1, false );
console.log ( myArray );