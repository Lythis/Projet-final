<?php
    require_once('db/base_PDO.php');

    function connexionDeconnexion($dontstartsession) {
        if($dontstartsession == false) {
            session_start();
        }
        if (isset($_POST['deconnexion']) && $_POST['deconnexion'] == 'valide') {
            session_unset();
            session_destroy();
            $_POST['deconnexion'] = '';
        }
    }

    function startSessionHere() {
        session_start();
        return true;
    }

    function estConnecte() {
        if(!empty($_SESSION)) {
            return true;
        }
        else {
            return false;
        }
    }

    function navBar() {
        if(!empty($_SESSION)) {
            require_once('./includes/nav-bar-login.php');
        }
        else {
            require_once('./includes/nav-bar.php');
        }
    }

    function footer() {
        if(!empty($_SESSION)) {
            require_once('./includes/footer-login.php');
        }
        else {
            require_once('./includes/footer.php');
        }
    }

    function accueil() {
        if (!empty($_SESSION)) {
            require_once('./includes/index-login.php');
        }
        else {
            require_once('./includes/index-no-login.php');
        }
    }

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

    function creerProfil($pseudo, $email, $mdp, $genre) {
        $con = connexionBdd();

        $query = $con->prepare('INSERT INTO profil (Pseudo_profil, Mail_profil, MotDePasse_profil, Genre_profil, Image_profil, Description_profil, `#Id_role`) VALUES (:pseudo, :email, :password, :genre, :image, :description, :role)');
        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $mdp);
        $query->bindParam(':genre', $genre);
        $query->bindParam(':image', $image_default_profil);
        $query->bindParam(':description', $description_default_profil);
        $query->bindParam(':role', $role);
        $image_default_profil = "Default.png";
        $description_default_profil = "Aucune information disponible.";
        $role = 2;
        $query->execute();
    }

    function selectAllProfil() {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM profil");
        $query->execute();
        return $query->fetchAll();
    }

    function selectAllQuestions($order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM question ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromQuestion($idquestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $idquestion ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromProfil($idprofil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM profil WHERE `Id_profil` = $idprofil");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromQuestionWithIdProfil($idprofil, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `question` WHERE `#Id_profil` = $idprofil ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromReponseWithIdQuestion($idquestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idquestion) ORDER BY `Date_reponse` $order");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromProfilWithIdQuestion($idquestion, $idprofil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_profil` = $idprofil )");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromProfilWithIdReponse($idquestion, $idreponse) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `reponse` WHERE `#Id_question` = $idquestion AND `Id_reponse` = $idreponse)");
        $query->execute();
        return $query->fetchAll();
    }

    function selectFromCategorieWithIdQuestion($idquestion, $idcategorie) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_categorie` = $idcategorie )");
        $query->execute();
        return $query->fetchAll();
    }

    function getNombreReponses($reponses) {
        $nombrereponses = 0;
        if(!empty($reponses)) {
            for ($ind=0; $ind < count($reponses); $ind++) { 
                $nombrereponses = $nombrereponses + 1;
            }
        }
        return $nombrereponses;
    }

    function insertIntoQuestion($question, $date, $utilisateur, $categorie) {
        $con = connexionBdd();

        $query = $con->prepare('INSERT INTO `question`(`Titre_question`, `Date_creation_question`, `#Id_profil`, `#Id_categorie`) VALUES (:question, :dateajd, :id_user, :id_categorie)');
        $query->bindParam(':question', $question);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $utilisateur);
        $query->bindParam(':id_categorie', $categorie);
        $query->execute();
    }

    function insertIntoReponse($reponse, $date, $utilisateur, $question) {
        $con = connexionBdd();
            
        $query = $con->prepare('INSERT INTO `reponse`(`Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES (:reponse, :dateajd, :id_user, :id_question)');
        $query->bindParam(':reponse', $reponse);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $utilisateur);
        $query->bindParam(':id_question', $question);
        $query->execute();
    }

    function obtenirDate() {
        $obtenirdate = getdate();
        return $obtenirdate['year']."-".$obtenirdate['mon']."-".$obtenirdate['mday'];
    }

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

    function deleteQuestion($idquestion) {
        $con = connexionBdd();

        $query = $con->prepare('DELETE FROM `reponse` WHERE `#Id_question` = :id');
        $query->bindParam(':id', $idquestion);
        $query->execute();

        $query = $con->prepare('DELETE FROM `question` WHERE `Id_question` = :id');
        $query->bindParam(':id', $idquestion);
        $query->execute();
    }

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

        if(!empty($_POST['nvmdp']) && $_POST['nvmdp'] != $users[0]['MotDePasse_profil']) {

            if(isset($_POST['nvmdpconfirm']) && $_POST['nvmdp'] == $_POST['nvmdpconfirm']) {

                if($_POST['mdp'] == $users[0]['MotDePasse_profil']) {
                    $nouveaumdp = $_POST['nvmdp'];
                    $query = $con->prepare("UPDATE `profil` SET `MotDePasse_profil` = :mdp WHERE `Id_profil` = $idprofil");
                    $query->bindParam(':mdp', $nouveaumdp);
                    $query->execute();

                    if($_SESSION['utilisateur']['id'] == $users[0]['Id_profil']) {
                        $users = selectFromProfil($idprofil);
                        $_SESSION['utilisateur']['mdp'] = $users[0]['MotDePasse_profil'];
                    }

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
?>