// Fonction de chargement du DOM

$(document).ready(function(){


    // Créer une fonction pour le formulaire de soumission d'un message


        $('main form').submit(function(evt){

            //empêcher le comportement par défaut du formulaire

            evt.preventDefault();

            // Déclaration des variables du formulaire

            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userSelect = $('#userSelect');
            var userMessage = $('#userMessage');
            var formScore = 0;

            //conditions de validation du formulaire

            // Nom de l'utilisateur
            if (userName.val().length < 3){
                console.log (' Minimum 4 Caratères');
                 $('[for="userName"] b').text( 'minimum 5 caractères');
            } else {
                console.log('Nom ok');
                formScore++;
            };

            // Mail de l'utilisateur
            if (userEmail.val().length < 5){
                $('[for="userEmail"] b').text( 'minimum 5 caractères');

                console.log (' Minimum 5 Caratères');
            } else {
                console.log('Email ok');
                formScore++;
            }

            // Select de l'utilisateur
            if( userSelect.val()== 'null'){
                console.log(' Veuillez selectionner un utilisateur')
                
            }else{
                console.log('Utilisateur ok');
                formScore++;
            };

            // Champs de message
            if( userMessage.val().length < 5 ){
                 $('[for="userMessage"] b').text( 'minimum 5 caractères');
                console.log('Le message est trop court')
            }else{
                console.log('Message ok');
                formScore++;
            };
            
            // validation finale du formulaire

            if(formScore == 4){
            console.log('le formulaire est validé')

            // Vider les champs du formulaire
            $('main form')[0].reset();

            // Supprimer les messages d'erreur
            $('form b').text('');

        
            };
        
        });



});//fin de la  fonction d'attente de chargement du DOM