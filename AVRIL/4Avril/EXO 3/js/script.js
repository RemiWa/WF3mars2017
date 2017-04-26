//Fonction de chargement du DOM

$(document).ready(function(){

    $('h3').click(function(){

       // Fermer la balise suivannt .open
       $('.open').not(this).next().slideUp().prev().removeClass('open').children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

       // Faire un toggle de la class open sur la balise h3
       $(this).toggleClass('open');

       //Faire un slideToglle sur la balise suivante
       $(this).next().slideToggle();

       //selectionner la balise .fa pour toggle la class
       $(this).children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

    });



}); // Fin de la fonction d'attente de chargement du DOM