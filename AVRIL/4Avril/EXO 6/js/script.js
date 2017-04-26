// Fonction d'attente de chargement du DOM

$(document).ready(function(){


    /*
    homePage
    */



            //Burger Menu

            $('.homePage h1 + a').click(function(evt){

                //Bloquer le comportementnaturel de ma balise a
            evt.preventDefault();

            // appliquer la fontion slideToggle sur la nav
            $('.homePage nav').slideToggle();


            });






            //Burger menu navigation

            $('.homePage nav a').click(function(evt){

                // Bloquer le comportement naturel de la balise a
                evt.preventDefault();

                var linkToOpen = $(this).attr('href');
                console.log ($(this).attr('href'));


                // Fermer le burger Menu
                $('.homePage nav').slideUp(function(){

                    window.location = linkToOpen;

                });

            });


    /*
    AbOUT Page
    */


    //capter le click sur le burger menu
    $('.aboutPage h1 + a').click(function(evt){

        // Bloquer le comportement naturel de la balise a
        evt.preventDefault();

        //selectionner la nav pour y appliquer une fonction animate
        $('.aboutPage nav').animate({

            left: '0'

        });

        //burger menu de navigation
        $('.aboutPage nav a').click(function(evt){

        // Bloquer le comportement naturel de la balise a
        evt.preventDefault();

        var linkToOpen = $(this).attr('href');


        //fermer le burgerMenu
        $('.aboutPage nav').animate({

            left: '-100%'
        }, function(){

            //changer de Page
            window.location=linkToOpen;
        
            })

        });
    });











}); //fin de la fonction d'attente de chargement du DOM