<?php
    require_once('fonctions/fonctions.php');
    $title ='Connexion/Inscription';
    require_once('includes/header.php');

    // root@livequestion.com 12345
    if (!empty($_POST['email']) && !empty($_POST['mdp']) && isset($_POST['connexion']) && $_POST['connexion'] == 'valide') {
        $connexion = true;
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $profil = selectAllProfil();
        
        $ind = 0;
        $connexionvalide = false;
        
        while ($ind < count($profil) && $connexionvalide == false) {
            
            if($profil[$ind]['Mail_profil'] == $email && $profil[$ind]['MotDePasse_profil'] == $mdp) {
                $connexionvalide = true;

                connexionSession($profil[$ind]['Id_profil'], $profil[$ind]['Mail_profil'], $profil[$ind]['Pseudo_profil'], $profil[$ind]['Genre_profil'], $profil[$ind]['Image_profil'], $profil[$ind]["#Id_role"]);
            }
            else {
                $ind = $ind + 1;
            }
            
        }
    }

    elseif (!empty($_POST['pseudoinscription']) && !empty($_POST['emailinscription']) && !empty($_POST['mdpinscription']) && !empty($_POST['mdpinscriptionconfirm']) && $_POST['mdpinscriptionconfirm'] == $_POST['mdpinscription'] && isset($_POST['inscription']) && $_POST['inscription'] == 'valide') {
        $creationreussi = true;

        creerProfil($_POST['pseudoinscription'], $_POST['emailinscription'], $_POST['mdpinscription'], $_POST['genreInscription']);
    }

    navBar($_SESSION);
    require_once('./includes/connexion_inscription_message.php');
?>