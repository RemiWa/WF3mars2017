var myNumber = 45;


//  égalité simple: Vérifier la valeur de la variable

console.log( myNumber == 45 ); // => True
console.log( myNumber == "45" ); //=> True

// ici c'est True parce qu'une égalité simple ne vérifie que la valeur, et pas le type de variable

// Inégalité simple
console.log( myNumber != 45 );
console.log ( myNumber != '45');

console.log( myNumber != 12) ;

// egalité stricte permet de vérifier la valeur et le type de la variable
console.log( myNumber === 45);
console.log( myNumber === '45');


//  inégalité stricte 
console.log ( myNumber !== 45 ); //=> False
console.log( myNumber !== '45' ); 

//  Superieur , Inferieur
console.log(myNumber > 54 );
console.log ( myNumber < 46 );

// Superieur ou égale, inferieur ou égale
console.log(myNumber <= 46);
console.log (myNumber>=12);

