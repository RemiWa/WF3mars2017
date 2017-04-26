//Fonction de chargement du DOM

$(document).ready(function(){

    //ouvrir la modal

    $('button').click(function(){
        
        $('section').fadeIn();

    });
    
    //Fermer la modal
    $('.fa').click(function(){

        $('section').fadeOut();

    });


    // capter le keypress
    $(document).keyup(function(evt){

        if(evt.keyCode==27){

            $('section').fadeOut();

        };

    });


    //

}); // Fin de la fonction d'attente de chargement du DOM