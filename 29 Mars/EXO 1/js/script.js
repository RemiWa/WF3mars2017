//  Créer un tableau contenant 4 index

var myArray = ["Texte", 123, true, false ];
console.log( myArray);

//  Ajouter un string dans le tableau , Afficher el tableau dans la console

myArray.push('truc en plus');
console.log( myArray );

// Afficher dnasa la console la taile du tableau, Afficher chacun des index du tableau dans al consoe

console.log( 'la taille du tableau est '+ myArray.length );
console.log( myArray[0]);
console.log( myArray[4]);

//  créer un objet

var  tableau = {

    tableau: myArray,
    firstname: 'Rémi',
    age: 30,
};

console.log( tableau );

//  Afficher toutes les propriétés de l'objet dans la console
console.log( tableau.age );
console.log( tableau.myArray );
console.log( tableau.firstname );

// Afficher al propriété de l'objet dnas la console

tableau.age = 32;
console.log( tableau );