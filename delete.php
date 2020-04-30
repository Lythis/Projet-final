<?php
    require_once('./fonctions/fonctions.php');
    $startedSession = startSessionHere();

    if(!empty($_SESSION['utilisateur'])) {
        if(isset($_POST['profil'])) {
            $toDelete = $_POST['profil'];
            $title = 'Supprimer le profil '.$toDelete;

            if($_SESSION['utilisateur']['id'] == $toDelete || $_SESSION['utilisateur']['role'] == 1) {
                deleteProfil($toDelete);

                $success = true;

                if($_SESSION['utilisateur']['id'] == $toDelete) {
                    session_unset();
		            session_destroy();
                }
            }
        }

        elseif(isset($_POST['question'])) {
            $toDelete = $_POST['question'];
            $title = 'Supprimer la question '.$toDelete;

            $userquestion = selectFromQuestion($toDelete, "DESC");

            if($_SESSION['utilisateur']['id'] == $userquestion['#Id_profil'] || $_SESSION['utilisateur']['role'] == 1) {
                deleteQuestion($toDelete);

                $success = true;
            }
        }
    }

    require_once('includes/header.php');

    navBar();

    require_once('./includes/delete_message.php');
    footer()
?>