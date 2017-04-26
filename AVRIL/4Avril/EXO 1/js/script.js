// attendre le chargement du DOM
$(document).ready(function(){

    //Fonction animate()

    $('section:first button').click(function(){

        //Changer la couleur de fond et la taille de l'article
        $('section:first article').animate({

            background: 'blue',
            width: '20rem'

        });

    });



    
        // Fonction animate() valeurs dynamique
        $('section:nth-child(2) button').click(function(){

            $('section:nth-child(2) article').animate({

                left: '+=.5rem',
                top: '-=1rem'
                
            });

        });




        //Fonction animate(): toggle / show / hide

        $('section:nth-child(3) button').click(function(){

            $('section:nth-child(3) article').animate({

                width: 'toggle',

            });

    });


        //fonction animate() avec callBack

        $('section:last button').click(function(){

            $('section:last article').animate({

                width: '20rem',
                height: '20rem',
                //on ajoute la durée de l'animation en milisecondes juste après l'accollade
            },2000,function(){

                $(this).hide();
        });

    });








}); // Find e la fonction de chargement du DOM