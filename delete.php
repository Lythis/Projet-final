<?php
    require_once('./fonctions/fonctions.php');
    $startedsession = startSessionHere();

    if(!empty($_SESSION['utilisateur'])) {
        if(isset($_POST['profil'])) {
            $todelete = $_POST['profil'];
            $title = 'Supprimer le profil '.$todelete;

            if($_SESSION['utilisateur']['id'] == $todelete || $_SESSION['utilisateur']['role'] == 1) {
                deleteProfil($todelete);

                $success = true;

                if($_SESSION['utilisateur']['id'] == $todelete) {
                    session_unset();
		            session_destroy();
                }
            }
        }

        elseif(isset($_POST['question'])) {
            $todelete = $_POST['question'];
            $title = 'Supprimer la question '.$todelete;

            $userquestion = selectFromQuestion($todelete, "DESC");

            if($_SESSION['utilisateur']['id'] == $userquestion[0]['#Id_profil'] || $_SESSION['utilisateur']['role'] == 1) {
                deleteQuestion($todelete);

                $success = true;
            }
        }
    }

    require_once('includes/header.php');

    navBar($_SESSION);

    require_once('./includes/delete_message.php');
?>