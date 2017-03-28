/*
     Programme pour slauer un utilisateur et afficher son année de naissance.
    -Demander el bom et le prénom de l'utilisateur
    -Saluer en disant : Bonjour Prénom Prénom
    -Demander l'âge de 'ultisateur 
    -Afficher l'année de naissance
*/

var firstName = prompt('Quel est ton prénom ?');
var lastName = prompt('Quel est ton nom ?');

//  Saluer en disant: Bonjour Prénom nom
console.log('Bonjour ' + firstName + ' ' + lastName);


// Demander l'âge de l'utilisateur
var age = prompt('Quel est ton âge gros(se) ?');
console.log(age);

// Afficher l'année de naiassance?
var currentYear = 2017;

console.log( 'ton année de naissance est ' + ( currentYear - age ) );