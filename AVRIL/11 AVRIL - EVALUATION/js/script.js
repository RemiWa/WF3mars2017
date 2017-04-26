// Fonction d'attente de chargement du DOM

$(document).ready(function(){

        //capter l'évènement change sur les selects
        $('select').change(function(){
            
            
        //modifier la valeur src de catPick
        $('#catPick').attr('src', 'img/' + $(this).val() + '.jpg');

        });

        // Supprimer les classes error
        $(' select, textarea').focus(function(){
            $(this).removeClass('error');
        });


    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        //empêcher le comportement par défaut du formulaire
        evt. preventDefault();

        //Definir une variable pour la validation finale du formulaire
        var formScore =0;

        //déclarer les variables du formulaire
        var catChoice = $('#catChoice');
        var userMessage = $('#userMessage');
        

        // Condition de validation du formulaire

        // Pour le select
        if ( catChoice == 'chat_0'){
            catChoice.addClass('error');
        }else{
            //incrementer le formScore de 1
            formScore++;
        }
        

        // Pour le text Area
        if ( userMessage.val().length < 15 ){
            userMessage.addClass('error');
        }else{
            // incrémenter le formScore de 1
            formScore ++;
        }


        // Validation finale : vérifier la valeur de la variable formScore
            if( formScore == 2 ){

            console.log('le formulaire est validé')

            // Vider les champs du formulaire
            $('form')[0].reset();

            // modifier le contenu de la section pour remerciements
            $('#form').text('Merci pour votre demande d\'adoption de '+ catChoice.val());


            };

    });

}); // Fin de la fonction d'attente de chargement du DOM