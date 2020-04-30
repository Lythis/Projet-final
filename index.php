<?php
    // Appel aux fonctions PHP
    require_once('fonctions/fonctions.php');
    // Titre & header & navbar
    $title ='LiveQuestion';
    require_once('includes/header.php');
    navBar();

    // Fonction qui détermine l'accueil à utiliser
    accueil();

    // Footer
    footer();
?>