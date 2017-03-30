// attendre le chargelent du do 

$('document').ready(function(){


        // manbipuler le contenu texte du footer
        console.log( $('footer').text());

        // $('footer').text('sous la licence MIT');

        //  Manipuler le contenu HTML du footer
        console.log( $('footer').html());
        $('footer').html('sous la licence MIT');

        //  créer un objet sur la page d'accueil

        var content = {
        
        homeContent: {

            title:'Bienvenue sur mon site',
            content: 'Je suis le text de la page accueil'

        },


        portfolioContent : {

            title:'Bienvenue sur mon portfolio',
            content: 'Je suis le texte du portfolio'

        },

        contactContent : {

            title:'Bienvenue sur ma page contact',
            content: 'Je suis le texte du contact'

        }
        }
        // Créer une foncion pour gérer le menu
        function showMyContent(){

        // Capter le clic sur la première balise li

            $('li').click(function(){
                // récupérer la valeur de l'attribut data
                var dataValue = $(this).attr('data');
               

                // Modifier le cotneu de la balise h2
                $('h2').text(homeContent.title);

                //  Modifier le conteu de la balise page
                $('p').html(homeContent.content);

            });

        }
showMyContent()
}); // Find e la fonction de charement du DOM