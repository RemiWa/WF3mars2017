//  Capter l'évènement ready pour ajouter une fontion de callback (attendre le chargement du DOM

$(document).ready(function(){
    


    //  Capter l'évènement focus sur le textarea
    $('textarea').focus(function() {

            console.log('Minimum  10 caractères');

     }); 


    //   capter l'évènement Blur sur el text areat

    $('textarea').blur(function(){

        console.log("l'utilisateur est sorti du focus");  


    });



    // capter l'évèenement scroll sur le header
    $('header').scroll(function(){

        console.log('scroll');

    });


    // Capter l'évèenement hover sur le main

    $('main').hover(function(){
       console.log('hover');

    });


    //  Capter l'évènement click sur la balsie ajouter
    $('a').click(function(evt){

        // empêcher le comportement naturel de la balise ajouter
        evt.preventDefault();
        console.log('click sur la balise a');

    });

    //  Capter la soumission du formulaire
    $('form').submit( function(evt){

        evt.preventDefault();
        console.log('Soumission du formulaire');

    });



});// Fin de la fonction d'attente de chargement du DOM