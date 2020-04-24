<?php
    require_once('db/base_PDO.php');

    #Fonction pour se connecter/déconnecter, si la fonction startSessionHere() a été utilisé avant et a retourné true alors la session ne démarre pas ici, ne retourne rien
    function connexionDeconnexion($dontstartsession) {
        if($dontstartsession == false) {
            session_start();
        }
        if(isset($_POST['deconnexion']) && $_POST['deconnexion'] == 'valide') {
            session_unset();
            session_destroy();
            $_POST['deconnexion'] = '';
        }
    }

    #Fonction pour start une session à un endroit précis (autre que le header), retourne true
    function startSessionHere() {
        session_start();
        return true;
    }

    #Fonction qui retourne true si une session est active, false sinon
    function estConnecte() {
        if(!empty($_SESSION)) {
            return true;
        }
        else {
            return false;
        }
    }

    #Fonction pour savoir quelle navbar utiliser en fonction de l'état de la session, ne retourne rien
    function navBar() {
        if(!empty($_SESSION)) {
            require_once('./includes/nav-bar-login.php');
        }
        else {
            require_once('./includes/nav-bar.php');
        }
    }

    #Fonction pour savoir quel footer utiliser en fonction de l'état de la session, ne retourne rien
    function footer() {
        if(!empty($_SESSION)) {
            require_once('./includes/footer-login.php');
        }
        else {
            require_once('./includes/footer.php');
        }
    }

    #Fonction pour savoir quel accueil afficher en fonction de l'état de la session, ne retourne rien
    function accueil() {
        if (!empty($_SESSION)) {
            require_once('./includes/index-login.php');
        }
        else {
            require_once('./includes/index-no-login.php');
        }
    }

    #Connecter une session, retourne le tableau session
    function connexionSession($idprofil, $mailprofil, $pseudoprofil, $genreprofil, $imageprofil, $roleprofil) {
        return $_SESSION['utilisateur'] = [
            'id' => $idprofil,
            'email' => $mailprofil,
            'pseudo' => $pseudoprofil,
            'genre' => $genreprofil,
            'image' => $imageprofil,
            'role' => $roleprofil,
        ];
    }

    #Créer un profil, ne retourne rien
    function creerProfil($pseudo, $email, $mdp, $genre) {
        $con = connexionBdd();

        $query = $con->prepare('INSERT INTO profil (Pseudo_profil, Mail_profil, MotDePasse_profil, Genre_profil, Image_profil, Description_profil, `#Id_role`) VALUES (:pseudo, :email, :password, :genre, :image, :description, :role)');
        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $mdp); #Le mot de passe a déjà été crypté avant
        $query->bindParam(':genre', $genre);
        $query->bindParam(':image', $image_default_profil);
        $query->bindParam(':description', $description_default_profil);
        $query->bindParam(':role', $role);
        $image_default_profil = "Default.png";
        $description_default_profil = "Aucune information disponible.";
        $role = 2;
        $query->execute();
    }

    #Sélectionner tout les profils de la base de données, retourne les profils en tableau
    function selectAllProfil() {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM profil");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner toutes les questions de la base de données en donnant l'ordre de triage, retourne les questions en tableau
    function selectAllQuestions($order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM question ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une question en précisant son ID et l'ordre de triage, retourne la question en tableau
    function selectFromQuestion($idquestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $idquestion ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner un profil en précisant son ID, retourne le profil en tableau
    function selectFromProfil($idprofil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM profil WHERE `Id_profil` = $idprofil");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une question en précisant l'ID du profil auteur et l'ordre de triage, retourne la question en tableau
    function selectFromQuestionWithIdProfil($idprofil, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `question` WHERE `#Id_profil` = $idprofil ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une réponse en précisant l'ID de la question et l'ordre de triage, retourne la/les réponse(s) en tableau
    function selectFromReponseWithIdQuestion($idquestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idquestion) ORDER BY `Date_reponse` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner l'auteur d'une question en précisant l'ID de la question, retourne le profil en tableau
    function selectFromProfilWithIdQuestion($idquestion, $idprofil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_profil` = $idprofil )");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner l'auteur d'une réponse en précisant l'ID de la réponse, retourne le profil en tableau
    function selectFromProfilWithIdReponse($idquestion, $idreponse) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `reponse` WHERE `#Id_question` = $idquestion AND `Id_reponse` = $idreponse)");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une catégorie en précisant l'ID de la question, retourne la catégorie en tableau
    function selectFromCategorieWithIdQuestion($idquestion, $idcategorie) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_categorie` = $idcategorie )");
        $query->execute();
        return $query->fetchAll();
    }

    #Fonction pour compter le nombre de réponses à une question, retourne le nombre de réponses obtenues
    function getNombreReponses($reponses) {
        $nombrereponses = 0;
        if(!empty($reponses)) {
            for ($ind=0; $ind < count($reponses); $ind++) { 
                $nombrereponses = $nombrereponses + 1;
            }
        }
        return $nombrereponses;
    }

    #Fonction pour insérer une question dans la base de données, ne retourne rien
    function insertIntoQuestion($question, $date, $utilisateur, $categorie) {
        $con = connexionBdd();

        $query = $con->prepare('INSERT INTO `question`(`Titre_question`, `Date_creation_question`, `#Id_profil`, `#Id_categorie`) VALUES (:question, :dateajd, :id_user, :id_categorie)');
        $query->bindParam(':question', $question);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $utilisateur);
        $query->bindParam(':id_categorie', $categorie);
        $query->execute();
    }

    #Fonction pour insérer une réponse dans la base de données, ne retourne rien
    function insertIntoReponse($reponse, $date, $utilisateur, $question) {
        $con = connexionBdd();
            
        $query = $con->prepare('INSERT INTO `reponse`(`Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES (:reponse, :dateajd, :id_user, :id_question)');
        $query->bindParam(':reponse', $reponse);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $utilisateur);
        $query->bindParam(':id_question', $question);
        $query->execute();
    }

    #Fonction qui obtient un tableau date, retourne une date conforme pour la base de données
    function obtenirDate() {
        $obtenirdate = getdate();
        return $obtenirdate['year']."-".$obtenirdate['mon']."-".$obtenirdate['mday'];
    }

    #Fonction pour supprimer un profil de la base de données ainsi que les questions/réponses de ce profil, ne retourne rien
    function deleteProfil($idprofil) {
        $con = connexionBdd();

        $query = $con->prepare('DELETE FROM `reponse` WHERE `reponse`.`#Id_profil` = :id');
        $query->bindParam(':id', $idprofil);
        $query->execute();

        $query = $con->prepare('DELETE FROM `question` WHERE `question`.`#Id_profil` = :id');
        $query->bindParam(':id', $idprofil);
        $query->execute();

        $query = $con->prepare('DELETE FROM `profil` WHERE `profil`.`Id_profil` = :id');
        $query->bindParam(':id', $idprofil);
        $query->execute();
    }

    #Fonction pour supprimer une question de la base de données ainsi que les réponses de cette question, ne retourne rien
    function deleteQuestion($idquestion) {
        $con = connexionBdd();

        $query = $con->prepare('DELETE FROM `reponse` WHERE `#Id_question` = :id');
        $query->bindParam(':id', $idquestion);
        $query->execute();

        $query = $con->prepare('DELETE FROM `question` WHERE `Id_question` = :id');
        $query->bindParam(':id', $idquestion);
        $query->execute();
    }

    #Fonction pour modifier un profil de la base de données, retourne un tableau "success" définit auparavent
    function editProfil($idprofil, $success) {
        $con = connexionBdd();
        $users = selectFromProfil($idprofil);

        if(isset($_POST['pseudo']) && $_POST['pseudo'] != $users[0]['Pseudo_profil']) {
            if(!empty($_POST['pseudo'])) {
                $nouveaupseudo = $_POST['pseudo'];
                $query = $con->prepare("UPDATE `profil` SET `Pseudo_profil` = :pseudo WHERE `Id_profil` = $idprofil");
                $query->bindParam(':pseudo', $nouveaupseudo);
                $query->execute();

                if($_SESSION['utilisateur']['id'] == $users[0]['Id_profil']) {
                    $users = selectFromProfil($idprofil);
                    $_SESSION['utilisateur']['pseudo'] = $users[0]['Pseudo_profil'];
                }

                $success['pseudo'] = "true";
            }
            else {
                $success['pseudo'] = "failpseudo";
            }
        }

        if(isset($_POST['mail']) && $_POST['mail'] != $users[0]['Mail_profil']) {

            if(mailExist($_POST['mail']) == false) {

                if(!empty($_POST['mail'])) {
                    $nouveaumail = $_POST['mail'];
                    $query = $con->prepare("UPDATE `profil` SET `Mail_profil` = :mail WHERE `Id_profil` = $idprofil");
                    $query->bindParam(':mail', $nouveaumail);
                    $query->execute();

                    if($_SESSION['utilisateur']['id'] == $users[0]['Id_profil']) {
                        $users = selectFromProfil($idprofil);
                        $_SESSION['utilisateur']['mail'] = $users[0]['Mail_profil'];
                    }

                    $success['mail'] = "true";
                }
                else {
                    $success['mail'] = "failmail";
                }
            }
            else {
                $success['mail'] = "mailexist";
            }
        }

        if(!empty($_POST['nvmdp']) && !password_verify($_POST['nvmdp'], $users[0]['MotDePasse_profil'])) {
            $_POST['nvmdp'] = password_hash($_POST['nvmdp'], PASSWORD_DEFAULT);

            if(!empty($_POST['nvmdpconfirm']) && password_verify($_POST['nvmdpconfirm'], $_POST['nvmdp'])) {

                if(password_verify($_POST['mdp'], $users[0]['MotDePasse_profil'])) {
                    $nouveaumdp = $_POST['nvmdp'];
                    $query = $con->prepare("UPDATE `profil` SET `MotDePasse_profil` = :mdp WHERE `Id_profil` = $idprofil");
                    $query->bindParam(':mdp', $nouveaumdp);
                    $query->execute();

                    $success['mdp'] = "true";
                }
                else {
                    $success['mdp'] = "failmdp";
                }
            }
            else {
                $success['mdp'] = "failnvmdp";
            }
        }

        if(isset($_POST['description']) && $_POST['description'] != $users[0]['Description_profil']) {

            if(empty($_POST['description'])) {
                $nouvelledescription = "Aucune information disponible.";
                $query = $con->prepare("UPDATE `profil` SET `Description_profil` = :descri WHERE `Id_profil` = $idprofil");
                $query->bindParam(':descri', $nouvelledescription);
                $query->execute();
            }
            else {
                $nouvelledescription = $_POST['description'];
                $query = $con->prepare("UPDATE `profil` SET `Description_profil` = :descri WHERE `Id_profil` = $idprofil");
                $query->bindParam(':descri', $nouvelledescription);
                $query->execute();

                $success['description'] = "true";
            }
        }

        if(isset($_POST['genre']) && $_POST['genre'] != $users[0]['Genre_profil']) {
            $nouveaugenre = $_POST['genre'];
            $query = $con->prepare("UPDATE `profil` SET `Genre_profil` = :genre WHERE `Id_profil` = $idprofil");
            $query->bindParam(':genre', $nouveaugenre);
            $query->execute();

            $success['genre'] = "true";
        }

        connexionSession($users[0]['Id_profil'],$users[0]['Mail_profil'], $users[0]['Pseudo_profil'], $users[0]['Genre_profil'], $users[0]['Image_profil'], $users[0]['#Id_role']);

        return $success;
    }

    #Fonction pour vérifier dans la base de données si un email existe déjà, retourne true si oui, false sinon
    function mailExist($mail) {
        $users = selectAllProfil();

        $ind = 0;

        while ($ind < count($users)) {
            
            if($users[$ind]['Mail_profil'] == $mail) {
                return true;
            }
            else {
                $ind = $ind + 1;
            }
        }
        return false;
    }

    function editImage($idprofil) {
        $con = connexionBdd();
        $users = selectFromProfil($idprofil);

        $nouvelleimage = $_POST['image'];
        $query = $con->prepare("UPDATE `profil` SET `Image_profil` = :newimage WHERE `Id_profil` = $idprofil");
        $query->bindParam(':newimage', $nouvelleimage);
        $query->execute();

        if($_SESSION['utilisateur']['id'] == $users[0]['Id_profil']) {
            $users = selectFromProfil($idprofil);
            $_SESSION['utilisateur']['image'] = $users[0]['Image_profil'];
        }
    }
?>