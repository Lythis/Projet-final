
<?php
    require_once('fonctions/fonctions.php');
    $startedsession = startSessionHere();

    if(estConnecte() == true) {

        if(!empty($_GET['question'])) {
            $questionstatus = $_GET['question'];
            $questionstatus = explode(',', $questionstatus);
        }

        if(isset($questionstatus[0]) && !empty($questionstatus[0])) {
            $question = selectFromQuestion($questionstatus[0], "");

            if(isset($_POST['reponse']) && !empty($_POST['reponse'])) {
                insertIntoReponse($_POST['reponse'], obtenirDate(), $_SESSION['utilisateur']['id'], $questionstatus[0]);
            }
        }

        if(isset($question) && !empty($question) && !isset($questionstatus[1])) {

            $idquestion = $question[0]["Id_question"];
            $idprofil = $question[0]["#Id_profil"];
            $idcategorie = $question[0]["#Id_categorie"];

            $reponses = selectFromReponseWithIdQuestion($idquestion, "DESC");

            $users = selectFromProfilWithIdQuestion($idquestion, $idprofil);

            $categorie = selectFromCategorieWithIdQuestion($idquestion, $idcategorie);

            $title ='Question de '.$users[0]["Pseudo_profil"];
            require_once('includes/header.php');

            $nombrereponses = getNombreReponses($reponses);

            navBar($_SESSION['utilisateur']);

            require_once('./includes/affichage_question_reponse.php');
        }

        elseif(isset($questionstatus[1])) {
            $title = 'Suppression de la question';
            require_once('includes/header.php');
            require_once('includes/nav-bar-login.php');
            require_once('./includes/suppression_question.php');
        }

        else {
            $title = 'Question Invalide';
            require_once('includes/header.php');

            navBar();
            echo'<div class="card">
                    <div class="card-body" style="display: flex;">
                        <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style="  width: 90%;
                        margin-right: 6%;" class="" alt="facher">
                        <h6 class="mt-5">Question introuvable. <a href="./index.php">Revenir aux questions</a>.</h6></p>
                    </div>
                    </div>';

        }

    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo'<div class="card">
                    <div class="card-body" style="display: flex;">
                        <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style="  width: 90%;
                        margin-right: 6%;" class="" alt="facher">
                        <h6 class="mt-5">Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir une question!</a>.</h6></p>
                    </div>
                    </div>';
    }
    
    footer()
?>