// //  Créer une application pour calculer une moyenne
/**
 l'utilisateur   a la capacitié d'ajouter autant de note s qu'il le souhaite
 - Lorsqu'il le souhaite il peut calcule rla moyenne des notes

 */

//  Variables globales
var notesArray = []; // => tableau vide
var notesAmount = 0;

// fontions
function addNote(){

    // Demander à l'utilisateur d'ajouter une note
    var newNote = prompt('Ajouter une note de 0 à 20');

    // Convertir newNote en variable de type number
    var newNotenumber = parseInt(newNote);

    // Ajouter la note dans le tableau
    notesArray.push( +newNote );
    console.log( notesArray );

    // Additionner notesAmount et newNote
    notesAmount += +newNote;
    console.log( notesAmount );

}


function average(){

    // la  somme de toutes les notes divisée par le nombre de notes
    var averageNote= notesAmount / notesArray.length ;

    // Arrondire le résultat
    var roundAverage = Math.round( averageNote );

    console.log('la moyenne est de ' + roundAverage + '/20');

};