//Fonction de chargement du DOM

$(document).ready(function(){

    //Fontion FADE OUT

    $('section').eq(0).children('button').click(function(){

        $('section').eq(0).children('article').fadeOut(500);

    });



    //Fontion FADE OUT

    $('section').eq(1).children('button').click(function(){

        $('section').eq(1).children('article').fadeIn(500);

    });



    //Fontion FADE TOGGLE

    $('section').eq(2).children('button').click(function(){

        $('section').eq(2).children('article').fadeToggle(500);

    });


    //Fontion SLIDE

    $('section').eq(3).children('button').click(function(){

        $('section').eq(3).children('article').slideUp(1000);

    });

    //Fontion SLIDE Down

    $('section').eq(4).children('button').click(function(){

        $('section').eq(4).children('article').slideDown(1000);

    });















}); // Fin de la fonction d'attente de chargement du DOM