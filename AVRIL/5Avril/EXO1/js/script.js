$(document).ready(function(){

    //capter le click sur le premier bouton

    $('button').eq(0).click(function(){
        
           //charger le contenu de views/ about dans lapremière articledu main

           $('article').eq(0).load('views/about.html', function(){

                // Fonction de callback de la fonction load()
                console.log('le fichier about.html est chargé')

                //animer la première article 
                $('article').eq(0).fadeIn();

           });
    });


    //Capter le click sur le deuxième bouton
    $('button').eq(1).click(function(){

        // Charger dnas la deuxième sectuion le contenu de l'id portfolio de views/content.html
        $('article').eq(1).load('views/content.html #portfolio');

    });




    //Capter le click sur le troisième bouton
    $('button').eq(2).click(function(){

        // Charger dnas la deuxième sectuion le contenu de l'id portfolio de views/content.html
        $('article').eq(2).load('views/content.html #contacts', function(){

            // Appeler la fontion submit fomr
            submitForm();
        });

    });




    //créer une fonction pour capter la soumission du formulaire

        function submitForm(){

        //capter la soumission du formulaire
        $('form').submit(function(evt){


            // créer une variable pour la validation finale du formulaire
            var formScore=0;


        //bloquer le comportement par défaut du form
        evt.preventDefault();
        console.log('submit');


        //minimum 4 caractères pour l'email et 5 pour le message
        if( $('[type="email"]').val().length < 4 
        
        ){

            console.log('email manquant');

        }else{
            console.log('email OK');
            formScore++;
        };






        //minimum 5 caractères pour le message

        if( $('textarea').val().length < 5 
        
        ){

            console.log('Message pas assez long mon gars');

        }else{
            console.log('message OK');
            //incrémenter formscore
            formScore++;
            
        };

        //vérifier la valeur de formscroe

        if( formScore == 2 ){

            console.log('Le formulaire est validé');
            
            // Envoi des données vers le fichier de traitement php
             //le fichier PHP répondu true, je peux continuer mon code.


             //Ajouter le message dnas la balise aside
             $('aside').append( '<h3>'+ $('textarea').val() + '</h3><p>' + $('[type="email"]').val() + '</p>');


            // Reset du formulaire
            $('form')[0].reset();

        }

        


        });


    }



}); //Fin de la fonction d'attente de chargement du DOM'