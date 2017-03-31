// Attendre le chargement du dom

$('document').ready(function(){


    // supprimer al classe active de la balise h1
    $('h1').removeClass('active');

    //  Ajouter la classe active à la balise h2
    $('h2').addClass('active');

    // Ajouter ou supprimer la class hidden sur la balise lorsquel'on clique sur la balise h2
    $('h2').click(function(){

        $('p').toggleClass('hidden');

    });

 }); // Find e la fonction de chargement du DOM