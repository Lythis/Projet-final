<?php
    require_once('./fonctions/fonctions.php');
    $title ='Poser une Question';
    require_once('includes/header.php');

    navBar();

    if (!empty($_POST['question']) && !empty($_POST['categorie']) && $_POST['poserquestion'] == 'valide') {

        insertIntoQuestion($_POST['question'], obtenirDate(), $_SESSION['utilisateur']['id'], $_POST['categorie']);
    ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><img src="image/check.gif" style="width: 48%; margin-right: 6%;" class="" alt="pouve en l\'air"><p>Votre question a bien été envoyé. <a href="./index.php">Voir les questions</a>.</p></p>
            </div>
        </div>
    <?php
        }

    elseif (estConnecte() == true) {
        require_once('./includes/poser_question.php');
    }

    else {
    ?>
        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text w-25"> <img src="image/tenor.gif" style="  width: 90%; margin-right: 6%;" class="" alt="facher"><h6>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour poser une question!</h6></p>
            </div>
        </div>
    <?php
    }

    footer()
?>