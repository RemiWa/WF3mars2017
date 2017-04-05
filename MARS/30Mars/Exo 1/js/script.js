//  créer un tableau contenant 4 prénoms    
// Faire une boucle sur le talbeau pour saluer dnas la console chacun des préenoms
// Afficher un message spécial pour votre prénoms


var users = [ 'Thurston', 'kim', 'Lee', 'remi'];
console.log(users);

for(var i=0; i < users.length; i++){

    // console.log('Salut '+ users[i]);

    if(users[i] =='remi'){
        console.log('eh, gros sac');

        //  Pour modiifier le contenu d'une balise HTML
        document.querySelector('p').textContent= "Salut, c'est moi";

    } else {console.log('Salut '+ users[i])

    };

}

