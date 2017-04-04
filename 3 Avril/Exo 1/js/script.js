// Attendre le chargement du dOM

$(document).ready(function(){


        //Créer un tableau pour enregistrer les avatar
        var myTown =  [];

        //récupérer la valeur de la class gender
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');

        var avatarGender;

            // avatarWoman capter le clic
               avatarWoman.click(function(){
               console.log('je suis une ' + avatarWoman.val() );
            });

               //avatarMan capter le click e

                avatarWoman.click(function(){
                console.log('je suis une' + avatarWoman.val() ) ;
                //désactiver avatarMan
                avatarMan.prop('checked', false);

                //modifier la valeur de avatarGender
                avatarGender = avatarWoman.val()

                //vider le message d'erreur
                $('.labelGender b ').text('');

                //chopper l'attribut de avatarbody 
                $('#avatarBody').attr('src', 'img/'+ avatarGender + '.png');

            });

        // avatarMan capter le clic
                avatarMan.click(function(){
                console.log('je suis un ' + avatarMan.val() );
                //désactiver avatarWoman
                avatarWoman.prop('checked', false);

                //modifier la valeur de avatarGender
                avatarGender = avatarMan.val()

                //vider le message d'erreur
                $('.labelGender b').text('');

                //chopper l'attribut de avatarbody 
                $('#avatarBody').attr('src', 'img/'+ avatarGender + '.png');

            });


            //capter les évènement change() sur les selects
            $('select').change(function(){

                console.log($(this).attr('id'), 'change:' + $(this).val() );

            //condition if pour modifier la valeur src de avatarrTop ou avatarStyleBottom
            if( $(this).attr('id') == 'avatarStyleTop') {

                console.log('Modification du style top');

                //modifier la valeur de l'attribut src de #avatarStyleTop
                $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');

            }else{

                console.log('Modification du style bottom');
                $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val() + '.png');

            }

            });




























    // Supprimer les messages d'erreur
    $('input, select').focus(function(){
        //selectionner la balise précédente 
        $('this').prev().children('b').text('');

    });


    //capter la soumission du formulaire
    $('form').submit(function(evt){

        //bloquer le comportement par défaut du formulaire
        evt.preventDefault();

        //Definir une variable pour la validation finale du formulaire
        var formScore = 0;

        //récupérer al valeur de #avatarName
        var avatarName = $('#avatarName').val();
        var avatarAge= $('#avatarAge').val();


        // récupérer al valeur de la l'id style
        var AvatarStyleTop = $('#avatarStyletop').val()
        var AvatarStyleBottom = $('avatarStyleBottom').val();

        //vérifier les champs des formulaires
            //avatarName minimum 5 caratères

            
            if( avatarName.length < 4 ){
                //Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarName"] b').text('Minimum 5 caractères');
            
            }else{ 
                //incrémenter la valeur formScore
                formScore++;
            }

        //Avatar Age entre 0 et 100
            if( avatarAge == 0 || avatarAge> 100|| avatarAge.length==0){

                //Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarAge"] b').text('Entre 1 et 500');
            } else { 
                console.log('avatarAge OK');

                //incrémenter la valeur formScore
                formScore++;

            };


            // avatarStyleTop obligatoire

            if( avatarStyleTop == 'null'){
                //Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarStyleTop"] b').text('Choisir un style en haut');
            }else{
                console.log('avatarStyletop Ok');
            
                //incrémenter la valeur formScore
                formScore++;

           };


            // avatarStyleTop obligatoire

            if( avatarStyleBottom == 'null'){
                //Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarStyleBottom"] b').text('Choisir un style en bas');
            }else{
                console.log('avatarStyleBottom Ok');

                //incrémenter la valeur formScore
                formScore++;
            };


            //avatar gender vérifier la valeur
            if( avatarGender == undefined ){
                //Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarGender"] b').text('Choisir un genre');

            }else{
                console.log('avatarGender Ok');

            //incrémenter la valeur formScore
            formScore++;
            };
            

            //vérifier la valeur de la variable formscore
            if ( formScore == 5){
                console.log('Le formulaire est validé! ');
            };

            // Envoyer les données du formulaire et attendre la réposne du serveur en ajax

            // Ajouter une ligne dans le tableau HTML
            $('table').append(''+
                    '<tr>'+
                        '<td><b>'+avatarName+'</b></td>'+
                        '<td>'+avatarAge+'</td>'+
                        '<td>'+avatarGender+'</td>'+
                    '<td>'+avatarStyleTop+ ',' + avatarStyleBottom+ '</td>'+
                '</tr>'
            );


            // Ajouter l'avatar dasn le tableau JS
            $(myTown).push({

                name: avatarName,
                gender: avatarGender,
                age: avatarAge,
                top: avatarStyleTop,
                bottom: avatarStyleBottom,
            });


            //vider les champs du formulaire
            $('form') [0].reset();

            // Revenir aux valeurs null pour l'avatar
            $('#avatarBody').attr('src', 'img/null.png');
            $('#avatarTop').attr('src', 'img/top/null.png');
            $('#avatarBottom').attr('src', 'img/bottom/null.png');
    
            //Afficher les données du tableau dans la console
            console.log( myTown.length );

            //afficher la taille totale de la ville
            $('#totalSims').text( myTown.length );
            $('#simsWoman b, #simsMan b').text('/' + myTown.length);

            //définir les variables globales pour les statistiques

            //Faire une boucle for sur mytown pour connaitre les stats

            for( var i=0; i < myTown.length; i++){
                console.log( myTown[i].gender );

                // Condition pour le genre
                if( myTown[i].gender == 'girl') {
                    totalGirls++;
                } else {
                    totalBoys++;
                }    
                //additionner les ages 
                totalAge += myTown[i].age;
            };

                //afficher dans le tableau HTML le nombre de girls et lenombe de boys
            $('#simsWoman').html(totalGirls+ '<b>/' + myTown.length + '</b>');
            $('#simsMan').html(totalGirls+ '<b>/' + myTown.length + '</b>');

            //afficher l'âge total dans la consoel
            var ageAmountRounded = Math.round( totalAge / myTown.length);
            $('#simsAgeAmount').html ( Ageamount + '/ans' );
            
});

}); // fin de la fonctiond e chargement de du DOM