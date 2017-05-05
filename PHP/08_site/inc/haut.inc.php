<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Ma boutique</title>

    <!--les liens bootstrap-->
    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/bootstrap.min.css'; ?>" >
    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/shop-homepage.css'; ?>" >
    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/portfolio-item.css'; ?>" >
    <script src="<?php echo RACINE_SITE . 'inc/js/jquery.js'; ?>"></script>
    <script src="<?php echo RACINE_SITE . 'inc/js/bootstrap.min.js'; ?>"></script>

</head>
<body>
    <!-- navigation -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle= "collapse" data-target="#bs-exemple-navbar-collapse-1" aria-expanded="false" aria-contols="navbar">
                   >
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php echo RACINE_SITE . 'boutique.php'; ?>">Ma Boutique</a>

            </div>

            <div class="collapse navbar-collapse" id="bs-exemple-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <?php

                    echo '<li><a href="'.RACINE_SITE.'boutique.php">Boutique</a></li>';

                    if(internauteEstConnecte()){
                        echo '<li><a href="'.RACINE_SITE.'profil.php">profil</a></li>';
                        echo '<li><a href="'.RACINE_SITE.'connexion.php?action=deconnexion">Se déconnecter</a></li>';

                    }else { //s'il n'est pas connecté

                        echo '<li><a href="'.RACINE_SITE.'inscription.php">Inscription</a></li>';
                        echo '<li><a href="'.RACINE_SITE.'connexion.php">Connexion</a></li>';

                    }

                    echo '<li><a href="'.RACINE_SITE.'panier.php">Panier ('.compte().')</a></li>';

                    //Menu admin
                    if(internauteEstConnecteEtEstAdmin()){
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_boutique.php">Gestion de la boutique</a></li>';
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_commande.php">Gestion des commandes</a></li>';
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_membres.php">Gestion des membres</a></li>';
                    }



                    ?>
                </ul>

            </div>


        </div> <!--container -->

    </nav>

    <div class="container" style="min-height: 80vh;">
        <!--ici il y a le contenu spécifique pour chaque page
        -->



<?php




?>