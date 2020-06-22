<?php
    // Appel aux fonctions PHP
    require_once('fonctions/fonctions.php');
    // Titre & header & navbar
    $title ='Notifications';
    require_once('includes/header.php');
    navBar();
    if(estConnecte() == true) {
        if(isset($_POST["ami"]) && !empty($_POST["ami"])) {
            $postData = explode(',', $_POST["ami"]);
            $resultAmi = gererAmi($postData[0], $_SESSION["utilisateur"]["id"], $postData[1]);
        }
        require_once('includes/affichage_notifications.php');
    }
    else {
        echo "Vous devez être connecté pour accéder à vos notifications!";
    }

    // Footer
    footer();
?>