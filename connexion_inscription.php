<?php
    // Appel aux fonctions PHP & titre & header
    require_once('fonctions/fonctions.php');
    $title ='Connexion/Inscription';
    require_once('includes/header.php');

    // Si les informations de connexion ne sont pas vides
    // accès au compte root : root@livequestion.com, mdp : 12345 (tout les derniers comptes de la base de données ont le mot de passe "Jeff")
    if (!empty($_POST['email']) && !empty($_POST['mdp']) && isset($_POST['connexion']) && $_POST['connexion'] == 'valide') {
        $connexion = true;
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        // On récupère tout les profils de notre base de données dans un tableau $profil
        $profil = selectAllProfil();
        
        $ind = 0;
        $connexionvalide = false;
        
        // Tant qu'on est pas arrivé à la fin du tableau $profil et qu'on a pas trouvé le profil
        while ($ind < count($profil) && $connexionvalide == false) {
            
            // Si on trouve, on arrête le while et entre les informations dans la session
            if($profil[$ind]['Mail_profil'] == $email && password_verify($mdp, $profil[$ind]['MotDePasse_profil'])) {
                $connexionvalide = true;

                connexionSession($profil[$ind]['Id_profil'], $profil[$ind]['Mail_profil'], $profil[$ind]['Pseudo_profil'], $profil[$ind]['Genre_profil'], $profil[$ind]['Image_profil'], $profil[$ind]["#Id_role"]);
            }
            else {
                $ind = $ind + 1;
            }
            
        }
    }

    // Sinon si les informations d'inscription ne sont pas vides
    elseif (!empty($_POST['pseudoinscription']) && !empty($_POST['emailinscription']) && !empty($_POST['mdpinscription']) && !empty($_POST['mdpinscriptionconfirm']) && $_POST['mdpinscriptionconfirm'] == $_POST['mdpinscription'] && isset($_POST['inscription']) && $_POST['inscription'] == 'valide') {
        
        // Si le mail n'existe pas
        if(mailExist($_POST['emailinscription']) == false) {
            $creationreussi = true;

            // On crée son profil dans la base de données
            creerProfil($_POST['pseudoinscription'], $_POST['emailinscription'], password_hash($_POST['mdpinscription'], PASSWORD_DEFAULT), $_POST['genreInscription']);
        }
        // Sinon erreur
        else {
            $mailexist = true;
        }
    }

    // Navbar & message & footer
    navBar();
    require_once('./includes/connexion_inscription_message.php');
    footer();
?>