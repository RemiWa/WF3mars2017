// Fonction de chargement du DOM

$(document).ready(function(){

    // Fermer la modal
    $('.fa-times').click(function(){
        $('div').fadeOut();
    });

    // Supprimer les classes error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error');
    });

     //capter al soumission du formulaire
     $('form').submit(function(evt){

        //bloquer el comportement naturel du formulaire

        evt.preventDefault();
        
        console.log('submit');

        //définir les variables globales
        var userName= $('[placeholder="Your Name*"]');
        var userEmail= $('[placeholder="Your email*"]');
        var userSubject= $('select');
        var userMessage= $('textarea');
        var formScore = 0;

        // verifier que l'utilisateur a bien saisi son nom

        if (userName.val().length == 4){
            //Ajouter la classe error sur l'input
            userName.addClass('error');
        }else{
            formScore++;

        };

        //vérifier que l'utilisateur a bien saisi au moins 4 caractères
        if( userEmail.val().length < 4){
            //Ajouter la classe error sur l'input
            userEmail.addClass('error');
        }else{
            formScore++;
        }

        //vérifier que l'utilisateur a bien saisi au moins 4 caractères
        if( userSubject.val() == 'null'){
            //Ajouter la classe error sur l'input
            userSubject.addClass('error');
        }else{
            formScore++;
        };

        //vérifier que l'utilisateur a au moins saisi 5 caractères dasn le message
        if(userMessage.val().length < 5){
            //Ajouter la classe error sur l'input
            userMessage.addClass('error');
        }else{
            formScore++;
        }

        //Validation Finale du formulaire
        if (formScore == 4){
            console.log('le formulaire est validé')

            //Envoi des données dans le php
            //php répond True, continuer le traitement de formulaire

            // Afficher les données du formulaire dasn une modale
            $('div span').text( userName.val() );
            $('div b').text(userSubject.val() );
            $('div p:last').text(userMessage.val());

            //aficher la modal
            $('div').fadeIn();

            //Vider les champs du formulaire
            $('form')[0].reset();
        }

            



     });



});//fin de la  fonction d'attente de chargement du DOM