<?php
    // Appel aux fonctions PHP & titre & header & navbar
    require_once('./fonctions/fonctions.php');
    $title ='Poser une Question';
    require_once('includes/header.php');
    navBar();

    // Si nos POST no sont pas vide (qu'une question a donc été posée)
    if (!empty($_POST['question']) && !empty($_POST['categorie']) && $_POST['poserquestion'] == 'valide') {

        // On crée la question et affiche un message
        insertIntoQuestion($_POST['question'], obtenirDate(), $_SESSION['utilisateur']['id'], $_POST['categorie']);
    ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text" style="margin-left: 28%;"><img src="image/check.gif" style="width: 48%; margin-right: 6%;" class="" alt="pouve en l\'air"><p style="margin-left: 22%;">Votre question a bien été envoyé. <a href="./index.php">Voir les questions</a>.</p></p>
            </div>
        </div>
    <?php
        }
        // Si nos POST no sont pas vide (qu'une categorie a donc été posée)
        elseif (($_POST['ajoutCategorie'] == 'valide') && !empty($_POST['newCategorie'])) {

            // On crée la categorie et affiche un message
            insertIntoCategorie($_POST['newCategorie']);
        ?>
            <div class="card">
                <div class="card-body">
                    <p class="card-text" style="margin-left: 28%;"><img src="image/check.gif" style="width: 48%; margin-right: 6%;" class="" alt="pouve en l\'air"><p style="margin-left: 22%;">Votre catégorie à bien était enregistré. <a href="./index.php">Voir les questions</a>.</p></p>
                </div>
            </div>
        <?php
            }

    // Sinon si l'utilisateur est connecté, on met le formulaire de question
    elseif (estConnecte() == true) {
        require_once('./includes/poser_question.php');
    }

    // Sinon, accès refusé
    else {
    ?>
        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text w-25"> <img src="image/tenor.gif" style="  width: 90%; margin-right: 6%;" class="" alt="facher"><h6 style="margin-top: 8%;">Vous devez être <a href="./connexion_inscription.php">connecté</a> pour poser une question!</h6></p>
            </div>
        </div>
    <?php
    }
    // footer
    footer()
?>