// Fonction de chargement du DOM
$(document).ready(function(){

//Creer une fonction pour le formulaire de connexion


    $('header form').submit(function(evt){

        //empêcher le comportement par défaut du log in

        evt.preventDefault();

        //Déclarer les variables de la fonction login

        var logEmail = $('#logEmail');
        var logPassword = $('#logPassword');
        var formScore = 0;

        // Condtions de validations du formulaire
        //logEmail
        if(logEmail.val().length < 1){
            console.log('Minimum 1 caractère')
        }else{
            formScore ++;
        };

        //logPassword
        if (logPassword.val().length < 1){
            console.log('Minimum 1 caractère')
        }else{
            formScore++;
        }

        //validation du formulaire
        if (formScore == 2){
            console.log('le formulaire est validé')
        
            // Vider les champs du formulaire
            $('header form')[0].reset();

            // Supprimer les messages d'erreur
            $('form b').text('');


        }

    });





// creer une fonction pour le formulaire d'inscription

    // capter la soumission du formulaire
        $('main form').submit(function(evt){


                //bloquer le comportement par defaut du formulaire
                evt.preventDefault();

                //Definir les variables globales du formulaire
                var userName = $('#userName');
                var userLastname = $('#userLastname');
                var userContact = $('#userContact');
                var userConfirm = $('#userConfirm');
                var userPassword = $('#userPassword');
                var userDate = $('#userDate');
                // var dateNaissance = $('#dateNaissance');
                // var moisNaissance = $('#moisNaissance');
                // var anneeNaissance = $('#anneeNaissance');
                var radio = $('[type="radio"]');
                var formScoreB = 0;



            // Conditions de validation du formulaire
                    
                    // Prénom
                    if(userName.val().length < 3){
                            console.log(' Le nom doit comporter 3 caractère min.');
                    }else {
                        console.log('prénom ok');
                        formScoreB++;
                    };

                    //Nom
                    if( userLastname.val().length < 3){
                        console.log(' Le nom de famille doit comporter 3 caractère min.')
                    
                    }else{
                        console.log('nom ok');
                        formScoreB++;
                    };

                    // Contact
                    if( userContact.val().length< 5){
                        console.log(' L\' adresse doit comporter 5 caractère min.')
                    }else{
                        console.log('adresse ok');
                        formScoreB++;
                    };

                    // Confirm
                    if( userConfirm != userContact){
                        formScoreB++
                    }else{
                        console.log ('l\'adresse de confirmation doit être identique.')
                    };

                    //password
                    if( userPassword.val().length < 6){
                        console.log('Le mot de passe doit comporter 7 caractère min.')
                    }else{
                        console.log(' Pass ok');
                        formScoreB++;
                    }

                    // Date de naissance
                    if( userDate.val()== 'null'){

                        console.log(' Veuilleuz selectionner une date')

                    }else{
                        console.log(' date ok');
                        formScoreB++;
                    };


                    //Radial
                    if( radio[0].checked == false ){
                        console.log('vous devez sélectionner un genre');
                    }else{
                        console.log('ok');
                        formScoreB++;
                    }

                // validation finale du formulaire

                    if(formScoreB == 7){
                    console.log('le formulaire est validé')


                    // Vider les champs du formulaire
                    $('main form')[0].reset();

                    // Supprimer les messages d'erreur
                    $('form b').text('');

                };


            });




});//fin de la fonction d'attente de chargement du DOM