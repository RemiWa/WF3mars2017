//  Attendre le chatrgement du DOM

$(document).ready(function(){

    //  Créer une variable (string) pour le titre ptincipal du site
    var siteTitle= 'Rémi Warin <span> Graphiste pas top top </span>'

    //  Créer un tableau pour la nav
    var myNav = [ 'Accueil', 'Portfolio', 'Contacts'];



    //  créer un objet pourt les titres des pages
        var myTitles = {

        Accueil: 'Bienvenue sur la page d\'accueil',
        Portfolio: 'Découvrez mes travaux',
        Contacts: 'Contactez-moi pour plus d\'infos'
    };


    // Créer un objet pour le contenu des pages

        var myContent = { 

        Accueil: '<h3>Contenu de la page d\'accueil </h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum eveniet, corrupti rem voluptatum doloremque ipsam aperiam temporibus delectus, dolor, facilis veniam corporis, voluptates explicabo sed tenetur? Minus eaque ab, vel?</p>',
        Portfolio: '<h3> Contenu de la page Portfolio </h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum eveniet, corrupti rem voluptatum doloremque ipsam aperiam temporibus delectus, dolor, facilis veniam corporis, voluptates explicabo sed tenetur? Minus eaque ab, vel?</p>',
        Contacts: '<h3> contenu de la page Contacts </h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum eveniet, corrupti rem voluptatum doloremque ipsam aperiam temporibus delectus, dolor, facilis veniam corporis, voluptates explicabo sed tenetur? Minus eaque ab, vel?</p>'

    };



    //  générere une balise h1 avec el conten u de la variable sitetitle
    //  Afficher dnas la console le header
    var myHeader = $('header');

    myHeader.append('<h1>' + siteTitle + '</h1>');


    // Générer une balise nav+ul dans le header

    myHeader.append( '<nav><i class="fa fa-bars" aria-hidden="true"></i><ul></ul></nav>');

    // Activer le burger menu au click sur la balise .fa-bars
    $('.fa-bars').click(function(){

        $('nav ul').toggleClass('toggleBurger');
    });

    //  Fair eune boucle sur myNav pour générer les liens de la nav

    for ( i=0; i<myNav.length; i++){

        // console.log(myNav[i]);

        //Générer les balises HTML
        $('ul').append('<li><a href="' + myNav[i] + '">' + myNav[i] + '</a></li>');
    };
     


        //  Générer dans le main le titre issu de l'obnjet myTitles
        var myMain = $('main');
        myMain.append('<h2>' + myTitles.Accueil + '</h2>');
        myMain.append('<section>' + myContent.Accueil + '</section>' );

        //  Ajouter la class .active sur la première li de la nav
        $('nav li:first').addClass('active');


        //  cAPTER LE CLICK SUR LA BALISE a en bloquant le comportement naturel des balises a
        $('a').click(function(evt){
    
        // supprimer la classe .active des balises li de la nav
        $('nav li').removeClass('active');


        // bloquer le comprotement naturel de la balise
        evt.preventDefault();

        //  connaitre lo'ccurrence de la balise a suir lequel l'utilisateur a cliqué
        // this est un mot clé en javasscript qui epermet de savoir quel qest l'élément qui a déclenché cette fontion
        // console.log($(this));

        // Récupérer la valeur de l'attribut hrf

        // console.log($(this).attr('href'));

        // vérifier la valeur de l'attribut href pour afficher le bon titre
        if( $(this).attr('href')=='Accueil' ){

            $('h2').text( myTitles.Accueil);
            // Selectionner la section pour changer el contenu
            $('section').html(myContent.Accueil);

            //  ajjouter la classe active sur la balise li de la balise a selectionnée
            $(this).parent().addClass('active');


        } else if($(this).attr('href') == 'Portfolio'){

            $('h2').text( myTitles.Portfolio);
            // Selectionner la section pour changer el contenu
            $('section').html(myContent.Portfolio);

            //  ajjouter la classe active sur la balise li de la balise a selectionnée
            $(this).parent().addClass('active');

            
        } else {
            $('h2').text( myTitles.Contacts);
            // Selectionner la section pour changer el contenu
            $('section').html(myContent.Contacts);

            //  ajjouter la classe active sur la balise li de la balise a selectionnée
            $(this).parent().addClass('active');

    };

        // Fermer le burgermenu
        $('nav ul').removeClass('toggleBurger');


    } );




});  //Fin du chargement du DOM