//  Attendre le chargement du dom

$(document).ready(function(){


    // Code à exécuter sur la page une fois chargeée



/*
    Le deathSelector
*/
var deathSelector = $('h3').prev().parent().parent().next().parent().find('main').children('article').find('h3');
console.log('balise sélectionnée: ', deathSelector);




    /* 
    Les sélecteurs jQuery classique
    */

        // sélectionner une balise par son nom

        var myHTMLTag = $('header');
        console.log(myHTMLTag);

        //  Sélectionner une balise par sa classique
        var myClass= $('.myclass');
        console.log('myClass');

        //  Selectioner une balise par son id
        var myID = $('#myId');
        console.log('myId');

        // Le selecteur imbriqué
        var myItalic = $('h2 i');
        console.log('myItalic');

        // Sélecteur CSS 3
        var myFooter = $('body > main + footer');
        console.log('myFooter');

    /* 
    Les sélecteurs JQuery Spécifiques
    */

    // selecteurs d'enfants
    var myChildren = $('header').children('button');
    console.log('myChildren');

    // Selecteur de parents
    var myParent = $('h2').parent();
    console.log(myParent);

    // Rechercher une balise
    var myH2 = $('main').find('h2');
    console.log(myH2);

    var firstBtn = $('button:first');
    console.log('firstBtn');

    // Sélectionner le dernier
    var lastBtn = $('button:last');
    console.log(lastBtn);

    //  Sélectionner le énième
    var myLi = $('li').eq(1);
    console.log( myLi );

    // Selectionner la balise suivante
    var afterMain = $('main').next();
    console.log( afterMain );

    //  Selectionner la balise précédente
    var beforeMain = $('main').prev();
    console.log( beforeMain);

}); // Fin de la fonction d'attente du chargement du dom


