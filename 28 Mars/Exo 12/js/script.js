//  créer une variable de type objet 

var user = { 

    firstName: 'Julien',
    lastName: 'Noyer',

    // ajouter une fonction pour afficher le nom complet
        fullName: function(){
        console.log( this.firstName + ' ' + this.lastName ); 
    }
};

// Afficher l'obejt
console.log( user );

// Afficher une propriété de l'objet
console.log( user.firstName );

// Modifier la valeur d'une propriété de l'objet
user.lastName = 'Marley';
console.log( user );

// Applerer la fonction de l'objet:
user.fullName() ;