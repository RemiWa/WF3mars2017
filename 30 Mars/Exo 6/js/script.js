

// Selectionner la balise dnas laquelle ajouter une autre balise
var myNavUl= document.querySelector('ul');

// Créer un tableau contenant 4 titre

var myArray = [ 'home','about','portfolio','contacts'];

// faire une boucle sur le tableau
for (    var i =0; i<myArray.length; i++){

    // Créer une variable pour générer unebalise html

    var myNewTag = document.createElement('li');
    
    // Ajouter du contenu dans la balise génrée

    myNewTag.innerHTML =  '<a href="#">' + myArray[i] ;

    // Ajouter un enfant dans myMain
    myNavUl.appendChild( myNewTag );


}




