// Attendre le chargement du DOM

$(document).ready(function(){

    // Capter la soumission du formulaire

    $('form').submit(function(evt){

        // Definir une variable pour le scor du formulaire
        var formScore= 0;

        // Bloquer le comportement naturel du formulaire

        evt.preventDefault();

        // Connaitre la valeur saisie dans le input par l'utilisateur

        var userName = $('input').val();
        console.log( userName );

        // Connaître le nombre de caractères dans la valeur
        console.log( userName.length );

        //Connaitre la valeur saisie dans le textarea par l'utilisateur
        var userMessage = $('textarea').val();
        //connaitre le nombre de caractères dans la valeur
        console.log( userMessage.length);

        //Vérifier la taille de userName (min. 5 caractères)

        if (userName.length = 0){
            console.log('minimum 5 caractères');
            // Afficher un message dans le label
            $('[for="userName"] b').text('Champ Obligatoire');

        } else{
            console.log('userName OK');
            //incrémenter FormScore
            formScore++;
        };

        // Vérifier la taille du userMessage
        if (userMessage.length <4){
            console.log('minimum 5 caractères');
        $('[for="userMessage"] b').text('Champ Obligatoire');

        
        }else{
            console.log('userMessage ok');
            //incrémenter FormScore
            formScore++;
        };

        // vérifier la valeur de formScore pour valider le formulaire
        if (formScore == 2 ){
            console.log('le formulaire est validé')

        $('secion:last').append('<article><h4>' + userMessage + '</h4><p>' + userName + '</p></article<');

        // Envoyer les données dabns le fichier PHP
        //Vider les champs du formulaire
        $('input:not([type=""submit"])').val('');
        $('textarea').val('');

        };
    
        // Supprimer les messages d'erreyur
        $('input, textarea').focus(function(){

            $(this).prev().children('b').text('');

        });





  })






}); //Fin de la fonction d'attente de chargemebnt du dom 