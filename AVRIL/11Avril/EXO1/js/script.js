//attendre le chargement du dom

$(document).ready(function(){

        // Définir une variable
        var boxChecked;


        // Capter le click sur les checkbox
        $('[type="checkbox"]').click(function(){

            //definir la valeur de boxChecked
            boxChecked= $(this).val();


            // décocher les checkbox
            var checkboxArray =  $('[type="checkbox"]').not( $(this) ) 

            for( var i=0; i < checkboxArray.length; i++) {

                checkboxArray[i].checked = false;
            };

            //modifier l'image
            if ( $(this).val() == 'first' ){
                $('img').attr('src', 'img/1.jpg');

            }else if ( $(this).val() == 'second'){
                $('img').attr('src', 'img/2.jpg');
                
            }else if ( $(this).val() == 'third'){
                $('img').attr('src','img/3.jpg');
            }else {
                $('img').attr('src', 'img/4.jpg');
            }

        });


        // Capter la soumission du formulaire 
        $('form').submit(function(evt){

            evt.preventDefault();

        if (boxChecked == undefined){
            console.log ('vous devez choisir une image')
        }else{
            //Afficher la modal
            $('#modal').fadeIn();
        };


    });




}); // Fin de la fonction d'attente de chargement du DOM