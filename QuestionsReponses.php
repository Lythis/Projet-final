<?php
    // Appel aux fonctions PHP
    require_once('fonctions/fonctions.php');
    // On demande à démarrer la session ici plutôt que dans le header
    $startedSession = startSessionHere();

    // Si l'utilisateur est bien connecté
    if(estConnecte() == true) {

        // Si notre question dans l'url (GET) n'est pas vide
        if(!empty($_GET['question'])) {
            $questionStatus = $_GET['question'];
            // On sépare le GET après chaque virgule, ce qui nous donnes un tableau avec les 2 valeurs du GET (seulement une si le GET ne contient pas de virgule)
            $questionStatus = explode(',', $questionStatus);
        }

        // Si on a bien quelque chose dans la première ligne de notre tableau $questionStatus
        if(isset($questionStatus[0]) && !empty($questionStatus[0])) {
            // On prend la question de la base de données qui correspond à la première ligne de notre tableau $questionStatus et la met dans un tableau $question
            $question = selectFromQuestion($questionStatus[0], "");

            // Si on a bien une réponse qui a été envoyé en méthode POST
            if(isset($_POST['reponse']) && !empty($_POST['reponse'])) {
                // On insert la réponse dans la base de données (qui correspond à la bonne question)
                insertIntoReponse($_POST['reponse'], obtenirDate(), $_SESSION['utilisateur']['id'], $questionStatus[0]);
            }
        }

        // Si on a bien un tableau $question et qu'on a qu'une seule ligne dedans
        if(isset($question) && !empty($question) && !isset($questionStatus[1])) {
            // Assignation de variables depuis le tableau
            $idQuestion = $question["Id_question"];
            $idProfil = $question["#Id_profil"];
            $idCategorie = $question["#Id_categorie"];

            if(isset($_POST['remplaceCateg'])) {
                $idCategorie = $_POST['remplaceCateg'];
                updateCategQuestion($idQuestion, $idCategorie);
            }

            // On récupère les réponses à la question dans $reponses, l'utilisateur qui a posté la question dans $users et la categorie de la question dans $categorie
            $reponses = selectFromReponseWithidQuestion($idQuestion, "DESC");
            $users = selectFromProfilWithidQuestion($idQuestion, $idProfil);
            $categorie = selectFromCategorieWithidQuestion($idQuestion, $idCategorie);

            // Titre & header
            $title ='Question de '.$users["Pseudo_profil"];
            require_once('includes/header.php');

            // On obtient le nombre de réponses à la question dans un tableau $nombreReponses & appel de la navbar
            $nombreReponses = getnombreReponses($reponses);
            navBar();

            require_once('./includes/affichage_question_reponse.php');
        }

        // Sinon si on a une deuxième ligne dans notre tableau $questionStatus (donc qu'une virgule était bien présente == requête pour supprimer la question)
        elseif(isset($questionStatus[1])) {
            $title = 'Suppression de la question';
            require_once('includes/header.php');
            require_once('includes/nav_bar_login.php');
            require_once('./includes/suppression_question.php');
        }

        // Sinon, dans tout les autres cas, on affiche une erreur
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
            </div>
        <?php
        }
    }

    // Sinon si l'utilisateur n'est pas connecté, accès refusé!
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav_bar.php');
    ?>
        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style="  width: 90%; margin-right: 6%;" class="" alt="facher">
                <h6 class="mt-5">Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir une question!</h6></p>
            </div>
        </div>
    <?php
    }
    // Appel du footer
    footer()
?>