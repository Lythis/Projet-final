<?php
    // Appel aux fonctions PHP & commencer la session ici
    require_once('./fonctions/fonctions.php');
    $startedSession = startSessionHere();

    // Si l'utilisateur est bien connecté
    if(estConnecte() == true) {
        // Si on a bien un profil en POST (profil à supprimer)
        if(isset($_POST['profil'])) {
            // Assignation de variable & titre
            $toDelete = $_POST['profil'];
            $title = 'Supprimer le profil '.$toDelete;

            // Si l'utilisateur est le profil en question OU que l'utilisateur est admin
            if($_SESSION['utilisateur']['id'] == $toDelete || $_SESSION['utilisateur']['role'] == 1) {
                // On supprime le profil demandé
                deleteProfil($toDelete);
                $success = true;

                // Si l'utilisateur est le profil en question, on detruit la session
                if($_SESSION['utilisateur']['id'] == $toDelete) {
                    session_unset();
		            session_destroy();
                }
            }
        }

        // Sinon si c'est une question
        elseif(isset($_POST['question'])) {
            $toDelete = $_POST['question'];
            $title = 'Supprimer la question '.$toDelete;
            // On récupère l'auteur de la question pour vérification
            $userquestion = selectFromQuestion($toDelete, "DESC");

            // Si l'utilisateur est celui qui a posé la question OU que l'utilisateur est administrateur
            if($_SESSION['utilisateur']['id'] == $userquestion['#Id_profil'] || $_SESSION['utilisateur']['role'] == 1) {
                // On supprime la question demandée
                deleteQuestion($toDelete);
                $success = true;
            }
        }
        /*elseif(isset($_POST['categorie'])) {
            $toDelete = $_POST['categorie'];
            $title = 'Supprimer la categorie '.$toDelete;
        }*/
    }

    // Header & navbar & message & footer (la page n'est pas vraiment graphique, c'est surtout pour la requête)
    require_once('includes/header.php');
    navBar();
    require_once('./includes/delete_message.php');
    footer()
?>