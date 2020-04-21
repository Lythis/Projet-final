<?php
    require_once('./fonctions/fonctions.php');
    $title ='Poser une Question';
    require_once('includes/header.php');

    require_once('./includes/nav-bar-login.php');

    if (!empty($_POST['question']) && !empty($_POST['categorie']) && $_POST['poserquestion'] == 'valide') {

        insertIntoQuestion($_POST['question'], obtenirDate(), $_SESSION['utilisateur']['id'], $_POST['categorie']);

        echo '<p>Votre question a bien été envoyé. <a href="./index.php">Voir les questions</a>.</p>';

        }

    elseif (estConnecte($_SESSION['utilisateur']) == true) {
        require_once('./includes/poser_question.php');
    }

    else {
        echo '<p>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour poser une question!</p>';
    }

    require_once('includes/footer.php');
?>