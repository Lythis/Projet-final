<?php
    // Appel aux fonctions PHP
    require_once('./fonctions/fonctions.php');
    // On demande à démarrer la session ici plutôt que dans le header
    $startedSession = startSessionHere();

    //L'utilisateur est-il bien connecté?
    if(estConnecte() == true) {

        //On a bien recupéré des données en GET
        if(!empty($_GET['profil'])) {
            $profilStatus = $_GET['profil'];
            //Séparation du GET en 2 à partir de la virgule (création d'un tableau à 2 colonnes si on a bien une virgule, sinon une seule colonne)
            $profilStatus = explode(',', $profilStatus);
        }

        //Ici $profilStatus[0] == la première colonne du tableau qu'on a recupéré (donc de notre GET) || Est-ce qu'on a bien un profil présent dans le GET?
        if(isset($profilStatus[0])) {
            // On récupère le profil demandé en GET (dans notre tableau $profilStatus à la première ligne) dans un tableau $users
            $users = selectFromProfil($profilStatus[0]);
            $amis = getAmi($profilStatus[0]);
        }

        //Notre GET n'est pas vide et on a récupéré les informations de l'utilisateur présent dans notre GET (ici présent dans $users, donc si $users n'est pas vide)
        if(!empty($_GET['profil']) && !empty($users)) {
            // Assignation des variables
            $idProfil = $users["Id_profil"];
            $role = $users["#Id_role"];

            // On récupère les questions posées par le profil actuel dans un tableau $questions
            $questions = selectFromQuestionWithidProfil($idProfil, "DESC");

            // Title & header
            $title ='Profil de '.$users["Pseudo_profil"];
            require_once('includes/header.php');
        }

        //Notre tableau GET ($profilStatus) ne contient qu'une seule colonne
        if(!empty($_GET['profil']) && !empty($users) && !isset($profilStatus[1])) {
            // Affichage normal du profil demandé
            navBar();
            require_once('./includes/profil.php');
            footer();
        }

        //Une requête pour modifier le profil est présente (on a donc 2 colonnes dans notre GET ($profilStatus))
        elseif(!empty($_GET['profil']) && !empty($users) && isset($profilStatus[1])) {
            //La requête est-elle bien égale à "edit"?
            if($profilStatus[1] == "edit") {

                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilStatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Modification du profil de '.$users["Pseudo_profil"];
                    // Tableau utilisé dans la fonction editProfil() pour déterminé ce qui a été modifié ou non
                    $success = [
                        'pseudo' => "false",
                        'mail' => "false",
                        'mdp' => "false",
                        'description' => "false",
                        'genre' => "false",
                    ];
                    // Si on a une requête pour modifier l'image
                    if(isset($_FILES['image']) && !empty($_FILES['image'])) {
                        $editImageSuccess = editImage($profilStatus[0]);
                        $users = selectFromProfil($profilStatus[0]);
                    }
                    elseif(isset($_POST['suppImage'])) {
                        $suppImageSuccess = suppImage($profilStatus[0]);
                        $users = selectFromProfil($profilStatus[0]);
                    }
                    // Sinon si notre POST n'est pas vide (donc requête pour modifier le profil)
                    elseif(!empty($_POST)) {
                        $success = editProfil($profilStatus[0], $success);
                        $users = selectFromProfil($profilStatus[0]);
                    }
                    require_once('includes/header.php');
                    navBar();
                    require_once('./includes/edit_profil.php');
                    footer();
                    if(!empty($_POST)) {
                        $success = [
                            'pseudo' => "false",
                            'mail' => "false",
                            'mdp' => "false",
                            'description' => "false",
                            'genre' => "false",
                        ];
                        $_POST['pseudo'] = '';
                        $_POST['mail'] = '';
                        $_POST['mdp'] = '';
                        $_POST['nvmdp'] = '';
                        $_POST['nvmdpconfirm'] = '';
                        $_POST['description'] = '';
                        $_POST['genre'] = '';
                        $_POST['image'] = '';
                    }
                }

                //Message d'erreur car accès refusé
                else {
                    $title = 'Accès refusé';
                    require_once('includes/header.php');
                    navBar();
                ?>
                    <div class="card">
                        <div class="card-body" style="display: flex;">
                            <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                            <h6>Vous n'avez pas le droit de modifier ce profil. <a href="./index.php">Revenir à l'accueil</a>.</h6></p>
                        </div>
                    </div>
                <?php
                }
            }
        
            //La requête est-elle bien égale à "supp"?
            elseif($profilStatus[1] == "supp") {
                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilStatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Suppression du profil de '.$users["Pseudo_profil"];
                    require_once('includes/header.php');
                    navBar();
                    require_once('./includes/suppression_profil.php');
                }
                //Message d'erreur car accès refusé
                else {
                    $title = 'Accès refusé';
                    require_once('includes/header.php');
                    navBar();
                ?>
                    <div class="card">
                        <div class="card-body" style="display: flex;">
                            <p class="card-text w-25"> <img class="mt-2" src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                            <h6>Vous n'avez pas le droit de supprimer ce profil. <a href="./index.php">Revenir à l'accueil</a>.</h6></p>
                        </div>
                    </div>
                <?php
                    }
                }
            //La requête n'est pas égale à "edit ou a supp"
            else {
                $title = 'Erreur';
                require_once('includes/header.php');
                navBar();
            ?>
                <div class="card">
                    <div class="card-body" style="display: flex;">
                        <p class="card-text w-25"> <img src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                        <h6>Problème lors de votre requête. <a href="./index.php">Revenir à l'accueil</a>.</h6></p>
                    </div>
                </div>
            <?php
            }
        }

        //Message d'erreur classique si le profil est introuvable ou n'importe quel autre problème
        else {
            $title = 'Profil introuvable';
            require_once('includes/header.php');
            navBar();
        ?>
            <div class="card">
                <div class="card-body" style="display: flex;">
                    <p class="card-text w-25"> <img src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                    <h6>Profil introuvable. <a href="./index.php">Revenir à l'accueil</a>.</h6></p>
                </div>
            </div>
        <?php
        }
    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        navBar();
    ?>
        <div class="card">
            <div class="card-body" style="display: flex;">
                <p class="card-text w-25"> <img src="image/tenor.gif" style=" width: 90%; margin-right: 6%;" class="" alt="facher">
                <h6>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir un profil!</h6></p>
            </div>
        </div>
    <?php
    }
    footer()
?>