//  Selectionner la balise h1

var myTitle = document.querySelector('h1');


// Ajouter une class à une balise
myTitle.classList.add('error');

// Selectionner la dernière balise p

var myPara = document.querySelector('p:last-of-type');

// Supprimer la classe hidden
myPara.classList.remove('hidden');

//  Selectionner la balise button
var myButton = document.querySelector('button');

// Selectionner la permière balise h2
var myFirstH2 = document.querySelector('h2');

// Capter le clic sur le bouton
myButton.onclick = function(){

myFirstH2.classList.toggle('move')

}

    // Ajouter ou supprimer la classe move sur la première balises h2

