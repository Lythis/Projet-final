<?php
    require_once('./fonctions/fonctions.php');
    $startedsession = startSessionHere();
    //L'utilisateur est-il bien connecté?
    if(estConnecte() == true) {

        //On a bien recupéré des données en GET
        if(!empty($_GET['profil'])) {
            $profilstatus = $_GET['profil'];
            //Séparation du GET en 2 à partir de la virgule (création d'un tableau à 2 colonnes si on a bien une virgule, sinon une seule colonne)
            $profilstatus = explode(',', $profilstatus);
        }

        //Ici $profilstatus[0] == la première colonne du tableau qu'on a recupéré (donc de notre GET) || Est-ce qu'on a bien un profil présent dans le GET?
        if(isset($profilstatus[0])) {
            $users = selectFromProfil($profilstatus[0]);
        }

        //Notre GET n'est pas vide et on a récupéré les informations de l'utilisateur présent dans notre GET (ici présent dans $users, donc si $users n'est pas vide)
        if(!empty($_GET['profil']) && !empty($users)) {
            $idprofil = $users[0]["Id_profil"];
            $role = $users[0]["#Id_role"];

            $questions = selectFromQuestionWithIdProfil($idprofil, "DESC");

            $title ='Profil de '.$users[0]["Pseudo_profil"];
            require_once('includes/header.php');
        }

        //Notre tableau GET ($profilstatus) ne contient qu'une seule colonne
        if(!empty($_GET['profil']) && !empty($users) && !isset($profilstatus[1])) {

            navBar();
            require_once('./includes/profil.php');
            footer();
      
        }

        //Une requête pour modifier le profil est présente (on a donc 2 colonnes dans notre GET ($profilstatus))
        elseif(!empty($_GET['profil']) && !empty($users) && isset($profilstatus[1])) {
            //La requête est-elle bien égale à "edit"?
            if($profilstatus[1] == "edit") {

                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Modification du profil de '.$users[0]["Pseudo_profil"];
                    $success = [
                        'pseudo' => "false",
                        'mail' => "false",
                        'mdp' => "false",
                        'description' => "false",
                        'genre' => "false",
                    ];
                    if(!empty($_POST)) {
                        $success = editProfil($profilstatus[0], $success);
                        $users = selectFromProfil($profilstatus[0]);
                    }
                    require_once('includes/header.php');
                    require_once('includes/nav-bar-login.php');
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
                    }
                }

                //Message d'erreur car accès refusé
                else {
                    $title = 'Accès refusé';
                    require_once('includes/header.php');
                    require_once('includes/nav-bar.php');
                    echo 'Vous n\'avez pas le droit de modifier ce profil. <a href="./index.php">Revenir à l\'accueil</a>.';
                }
            }
        
            //La requête est-elle bien égale à "supp"?
            elseif($profilstatus[1] == "supp") {
                //Le profil demandé est le profil actuel de la session ou la session est administrateur
                if($_SESSION['utilisateur']['id'] == $profilstatus[0] || $_SESSION['utilisateur']['role'] == 1) {
                    $title = 'Suppression du profil de '.$users[0]["Pseudo_profil"];
                    require_once('includes/header.php');
                    require_once('includes/nav-bar-login.php');
                    require_once('./includes/suppression_profil.php');
                }
                //Message d'erreur car accès refusé
                else {
                    $title = 'Accès refusé';
                    require_once('includes/header.php');
                    require_once('includes/nav-bar.php');
                    echo 'Vous n\'avez pas le droit de modifier ce profil. <a href="./index.php">Revenir à l\'accueil</a>.';
                }
            }
            //La requête n'est pas égale à "edit ou a supp"
            else {
                $title = 'Erreur';
                require_once('includes/header.php');
                require_once('includes/nav-bar.php');
                echo 'Problème lors de votre requête. <a href="./index.php">Revenir à l\'accueil</a>.';
            }
        }

        //Message d'erreur classique si le profil est introuvable ou n'importe quel autre problème
        else {
            $title = 'Profil introuvable';
            require_once('includes/header.php');
            require_once('includes/nav-bar.php');
            echo 'Profil introuvable. <a href="./index.php">Revenir à l\'accueil</a>.';
        }
    }
    else {
        $title = 'Accès refusé';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo '<p>Vous devez être <a href="./connexion_inscription.php">connecté</a> pour voir un profil!</p>';
    }
?>