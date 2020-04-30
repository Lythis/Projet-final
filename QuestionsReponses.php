<?php
    require_once('fonctions/fonctions.php');
    $startedSession = startSessionHere();

    if(estConnecte() == true) {

        if(!empty($_GET['question'])) {
            $questionStatus = $_GET['question'];
            $questionStatus = explode(',', $questionStatus);
        }

        if(isset($questionStatus[0]) && !empty($questionStatus[0])) {
            $question = selectFromQuestion($questionStatus[0], "");

            if(isset($_POST['reponse']) && !empty($_POST['reponse'])) {
                insertIntoReponse($_POST['reponse'], obtenirDate(), $_SESSION['utilisateur']['id'], $questionStatus[0]);
            }
        }

        if(isset($question) && !empty($question) && !isset($questionStatus[1])) {

            $idQuestion = $question["Id_question"];
            $idProfil = $question["#Id_profil"];
            $idCategorie = $question["#Id_categorie"];

            $reponses = selectFromReponseWithidQuestion($idQuestion, "DESC");

            $users = selectFromProfilWithidQuestion($idQuestion, $idProfil);

            $categorie = selectFromCategorieWithidQuestion($idQuestion, $idCategorie);

            $title ='Question de '.$users["Pseudo_profil"];
            require_once('includes/header.php');

            $nombreReponses = getnombreReponses($reponses);

            navBar($_SESSION['utilisateur']);

            require_once('./includes/affichage_question_reponse.php');
        }

        elseif(isset($questionStatus[1])) {
            $title = 'Suppression de la question';
            require_once('includes/header.php');
            require_once('includes/nav_bar_login.php');
            require_once('./includes/suppression_question.php');
        }

        else {
            $title = 'Question Invalide';
            require_once('includes/header.php');

            navBar();
        ?>
            <div class="card">
                <div class="card-body" style="display: flex;">
                    <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                    <h6 class="mt-5">Question introuvable. <a href="./index.php">Revenir aux questions</a>.</h6></p>
                </div>
            </div>;
        <?php
        }

    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav_bar.php');
    ?>
        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style="  width: 90%; margin-right: 6%;" class="" alt="facher">
                <h6 class="mt-5">Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir une question!</a>.</h6></p>
            </div>
        </div>;
    <?php
    }
    
    footer()
?>