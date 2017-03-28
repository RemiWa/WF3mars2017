// créer un type d'objet pour en faire des déclinaisons
function CarType( paramDoors, paramColor, paramBrand, paramGear ){
    // des portes, une couleur, une marque
    this.doors = paramDoors;
    this.color = paramColor;
    this.brand = paramBrand;
    this.gear = paramGear;

};


// Ajouter ue fonctyion de type objet CarType
CarType.prototype.welcome = function(){

    console.log('bonjour, je suis une ' + this.brand + ' , je possède ' + this.doors + 'portes et ' + this.gear +' vitesse et je suis de couleur '+ this.color )
};
// Créer une déclinaaison de CarType

var fiat = new CarType(3, 'red', 'Fiat', 4);
console.log( fiat );

// appeler la fontcion
fiat.welcome();

var hummer = new CarType(5, 'black', 'Hummer', 8);
console.log( hummer );
hummer.welcome();