//Fonction de chargement du DOM

$(document).ready(function(){

    //Ouvrir Burger menu classique

    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);

    });


    // Fermer le burger menu classique
    $('a').click(function(evt){

        evt.preventDefault();
        $('nav ul').fadeOut(500);

    });


}); // Fin de la fonction d'attente de chargement du DOM