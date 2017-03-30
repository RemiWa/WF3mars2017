// Créer un tableau contenant trois prénoms

var users = ['John', 'Paul', 'Georges', 'Ringo'];

// Faire une boucle for sur le tableau pour saluer chacun des index
for( var i = 0; i < users.length; i++ ) {

    // code à executer à chquae itération
    console.log('salut '+ users[i]);

};

// Faire une boucle while sur le tableau pour saluer chacund es préneoms
// définir une variable i à 0

var i=0; 

// limiter la boucle à la taille du tableau
while(i < users.length){

    console.log('Salut '+ users[i]);
     
// incrémenter la variable de 1
    
    i++;

}