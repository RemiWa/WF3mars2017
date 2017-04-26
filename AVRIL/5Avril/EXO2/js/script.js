// Fonction d'attente de chargement du DOM

$(document).ready(function(){

    //écrire une fonction pour l'animation des compétences

    function mySkills( paramEq, paramWidth ){


        //animation des balises page
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({

            width: paramWidth

        });


    };

    

    // charger le contenu de la home dnas le main

    $('main').load('views/home.html');












    //créer une fonction pour ouvrir la modal
        function openModal(){
                
            $('button').click(function(){
              $('#modal').fadeIn();
            });

            $('.fa-times').click(function(){

                $('#modal').fadeOut();
            })

        };











    /*
    Burger Menu
    */

            //Burger Menu

            $('h1 + a').click(function(evt){

                //Bloquer le comportementnaturel de ma balise a
            evt.preventDefault();

            // appliquer la fontion slideToggle sur la nav
            $('nav').slideToggle();


            });


            //Burger menu navigation

            $('nav a').click(function(evt){

                // Bloquer le comportement naturel de la balise a
                evt.preventDefault();

                // Masquer le main
                $('main').fadeOut();



                var viewToLoad = $(this).attr('href');
                console.log ($(this).attr('href'));


                // Fermer le burger Menu
                $('nav').slideUp(function(){


                // charger la vue
                $('main').slideUp(function(){
                    

                    //charger la bonne vue puis afficher le main

                    $('main').load('views/'+ viewToLoad, function(){

                        $('main').fadeIn(function(){

                            //vérifier si l'utilisateur veut voir la page about.html
                            if(viewToLoad == 'about.html'){

                                //appeler la fontion mySkills
                                mySkills( 0, '84%');
                                mySkills( 1, '25%');
                                mySkills( 2, '5%');
                            };

                            // Vérifier si l'utilisateur est sur la page portfoio
                            if( viewToLoad == 'portfolio.html'){

                             // Appeler la fonction pour ouvrir la openModal
                             openModal();

                            }





                        });

                    });

                });

            });

      });


















}); //fin de la fonction d'attente de chargement du DOM