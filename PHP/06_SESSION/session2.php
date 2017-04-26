<?php

//creation ou ouverture de la session :
session_start(); //Lorsque j'effectue un session_start(), la session n'est pas recrée car elle existe déjà grace au session_start() lancé dans el fichier session1.php 

echo ' La session est accessible dans tous les scripts du site :';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; //affiche le contenu de la session.

// Ce fichier session2.php n'a rien à voir avec l'autre fichier de session. Il n'y a pas d'inclusion (include()) et pourtant il accède à la session en cours crée dans session1.php
// Notez que c'est l'identifiant de la session envoyée dans un cookie dnas le poste de l'internaute qui fait le lien et qui indique quelle session ouvrir dans session2.php'