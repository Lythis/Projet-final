<?php
    require_once('db/base_PDO.php');

    #Fonction pour se connecter/déconnecter, si la fonction startSessionHere() a été utilisé avant et a retourné true alors la session ne démarre pas ici, ne retourne rien
    function connexionDeconnexion($dontStartSession) {
        if($dontStartSession == false) {
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
            require_once('./includes/nav_bar_login.php');
        }
        else {
            require_once('./includes/nav_bar.php');
        }
    }

    #Fonction pour savoir quel footer utiliser en fonction de l'état de la session, ne retourne rien
    function footer() {
        if(!empty($_SESSION)) {
            require_once('./includes/footer_login.php');
        }
        else {
            require_once('./includes/footer.php');
        }
    }

    #Fonction pour savoir quel accueil afficher en fonction de l'état de la session, ne retourne rien
    function accueil() {
        if (!empty($_SESSION)) {
            require_once('./includes/index_login.php');
        }
        else {
            require_once('./includes/index_no_login.php');
        }
    }

    #Connecter une session, retourne le tableau session
    function connexionSession($idProfil, $mailProfil, $pseudoProfil, $genreProfil, $imageProfil, $roleProfil) {
        return $_SESSION['utilisateur'] = [
            'id' => $idProfil,
            'email' => $mailProfil,
            'pseudo' => $pseudoProfil,
            'genre' => $genreProfil,
            'image' => $imageProfil,
            'role' => $roleProfil,
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
        $query->bindParam(':image', $imageDefaultProfil);
        $query->bindParam(':description', $descriptionDefaultProfil);
        $query->bindParam(':role', $role);
        $imageDefaultProfil = "./image_profil/Default.png";
        $descriptionDefaultProfil = "Aucune information disponible.";
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

    #Sélectionner toutes les questions de la base de données en donnant l'ordre de triage et les limites de sélection, retourne les questions en tableau
    function selectAllQuestions($order, $limit, $offset) {
        $con = connexionBdd();

        $requete = "SELECT * FROM question ORDER BY `Date_creation_question` $order, `Id_question` $order";
        if ($limit != null) {
            $requete = $requete." LIMIT $limit OFFSET $offset";
        }
        $query = $con->prepare($requete);
        $query->execute();
        return $query->fetchAll();
    }

    #selectionner toutes les categories de la base de donnée en donnant l'ordre de triage, retourne les categorie en tableau
    function selectAllCategories($order) {
        $con = connexionBdd();
        
        $query = $con->prepare("SELECT * FROM categorie ORDER BY `Id_categorie` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une question en précisant son ID et l'ordre de triage, retourne la question en tableau
    function selectFromQuestion($idQuestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $idQuestion ORDER BY `Date_creation_question`");
        $query->execute();
        return $query->fetch();
    }

    #Sélectionner un profil en précisant son ID, retourne le profil en tableau
    function selectFromProfil($idProfil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM profil WHERE `Id_profil` = $idProfil");
        $query->execute();
        return $query->fetch();
    }

    #Sélectionner une question en précisant l'ID du profil auteur et l'ordre de triage, retourne la question en tableau
    function selectFromQuestionWithidProfil($idProfil, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `question` WHERE `#Id_profil` = $idProfil ORDER BY `Date_creation_question` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner une réponse en précisant l'ID de la question et l'ordre de triage, retourne la/les réponse(s) en tableau
    function selectFromReponseWithidQuestion($idQuestion, $order) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idQuestion) ORDER BY `Date_reponse` $order");
        $query->execute();
        return $query->fetchAll();
    }

    #Sélectionner l'auteur d'une question en précisant l'ID de la question, retourne le profil en tableau
    function selectFromProfilWithidQuestion($idQuestion, $idProfil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idQuestion AND `#Id_profil` = $idProfil )");
        $query->execute();
        return $query->fetch();
    }

    #Sélectionner l'auteur d'une réponse en précisant l'ID de la réponse, retourne le profil en tableau
    function selectFromProfilWithidReponse($idQuestion, $idReponse) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `reponse` WHERE `#Id_question` = $idQuestion AND `Id_reponse` = $idReponse)");
        $query->execute();
        return $query->fetch();
    }

    #Sélectionner une catégorie en précisant l'ID de la question, retourne la catégorie en tableau
    function selectFromCategorieWithidQuestion($idQuestion, $idCategorie) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idQuestion AND `#Id_categorie` = $idCategorie )");
        $query->execute();
        return $query->fetch();
    }

    #Fonction pour compter le nombre de réponses à une question, retourne le nombre de réponses obtenues
    function getnombreReponses($reponses) {
        $nombreReponses = 0;
        if(!empty($reponses)) {
            for ($ind=0; $ind < count($reponses); $ind++) { 
                $nombreReponses = $nombreReponses + 1;
            }
        }
        return $nombreReponses;
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
    function insertIntoCategorie($libelle) {
        $con = connexionBdd();
            
        $query = $con->prepare('INSERT INTO `categorie`(`Libelle_categorie`) VALUES (:libelle)');
        $query->bindParam(':libelle', $libelle);
        
        $query->execute();
    }

    #Fonction qui obtient un tableau date, retourne une date conforme pour la base de données
    function obtenirDate() {
        $obtenirDate = getdate();
        return $obtenirDate['year']."-".$obtenirDate['mon']."-".$obtenirDate['mday'];
    }

    #Fonction pour supprimer un profil de la base de données ainsi que les questions/réponses de ce profil, ne retourne rien
    function deleteProfil($idProfil) {
        $con = connexionBdd();

        $query = $con->prepare('DELETE FROM `reponse` WHERE `reponse`.`#Id_profil` = :id');
        $query->bindParam(':id', $idProfil);
        $query->execute();

        $query = $con->prepare('DELETE FROM `question` WHERE `question`.`#Id_profil` = :id');
        $query->bindParam(':id', $idProfil);
        $query->execute();

        $query = $con->prepare('DELETE FROM `profil` WHERE `profil`.`Id_profil` = :id');
        $query->bindParam(':id', $idProfil);
        $query->execute();
    }

    #Fonction pour supprimer une question de la base de données ainsi que les réponses de cette question, ne retourne rien
    function deleteQuestion($idQuestion) {
        $con = connexionBdd();

        $query = $con->prepare('DELETE FROM `reponse` WHERE `#Id_question` = :id');
        $query->bindParam(':id', $idQuestion);
        $query->execute();

        $query = $con->prepare('DELETE FROM `question` WHERE `Id_question` = :id');
        $query->bindParam(':id', $idQuestion);
        $query->execute();
    }

    #Fonction pour modifier un profil de la base de données (on vérifie à chaque fois ce qui a été saisie, si c'est égal aux données actuelles ou vide, on ne modifie rien), retourne un tableau "success" définit auparavent
    function editProfil($idProfil, $success) {
        $con = connexionBdd();
        $users = selectFromProfil($idProfil);

        if(isset($_POST['pseudo']) && $_POST['pseudo'] != $users['Pseudo_profil']) {
            if(!empty($_POST['pseudo'])) {
                $nouveauPseudo = $_POST['pseudo'];
                $query = $con->prepare("UPDATE `profil` SET `Pseudo_profil` = :pseudo WHERE `Id_profil` = $idProfil");
                $query->bindParam(':pseudo', $nouveauPseudo);
                $query->execute();

                if($_SESSION['utilisateur']['id'] == $users['Id_profil']) {
                    $users = selectFromProfil($idProfil);
                    $_SESSION['utilisateur']['pseudo'] = $users['Pseudo_profil'];
                }

                $success['pseudo'] = "true";
            }
            else {
                $success['pseudo'] = "failpseudo";
            }
        }

        if(isset($_POST['mail']) && $_POST['mail'] != $users['Mail_profil']) {

            if(mailExist($_POST['mail']) == false) {

                if(!empty($_POST['mail'])) {
                    $nouveauMail = $_POST['mail'];
                    $query = $con->prepare("UPDATE `profil` SET `Mail_profil` = :mail WHERE `Id_profil` = $idProfil");
                    $query->bindParam(':mail', $nouveauMail);
                    $query->execute();

                    if($_SESSION['utilisateur']['id'] == $users['Id_profil']) {
                        $users = selectFromProfil($idProfil);
                        $_SESSION['utilisateur']['mail'] = $users['Mail_profil'];
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

        if(!empty($_POST['nvmdp']) && !password_verify($_POST['nvmdp'], $users['MotDePasse_profil'])) {
            $_POST['nvmdp'] = password_hash($_POST['nvmdp'], PASSWORD_DEFAULT);

            if(!empty($_POST['nvmdpconfirm']) && password_verify($_POST['nvmdpconfirm'], $_POST['nvmdp'])) {

                if(password_verify($_POST['mdp'], $users['MotDePasse_profil'])) {
                    $nouveauMdp = $_POST['nvmdp'];
                    $query = $con->prepare("UPDATE `profil` SET `MotDePasse_profil` = :mdp WHERE `Id_profil` = $idProfil");
                    $query->bindParam(':mdp', $nouveauMdp);
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

        if(isset($_POST['description']) && $_POST['description'] != $users['Description_profil']) {

            if(empty($_POST['description'])) {
                $nouvelleDescription = "Aucune information disponible.";
                $query = $con->prepare("UPDATE `profil` SET `Description_profil` = :descri WHERE `Id_profil` = $idProfil");
                $query->bindParam(':descri', $nouvelleDescription);
                $query->execute();
            }
            else {
                $nouvelleDescription = $_POST['description'];
                $query = $con->prepare("UPDATE `profil` SET `Description_profil` = :descri WHERE `Id_profil` = $idProfil");
                $query->bindParam(':descri', $nouvelleDescription);
                $query->execute();

                $success['description'] = "true";
            }
        }

        if(isset($_POST['genre']) && $_POST['genre'] != $users['Genre_profil']) {
            $nouveauGenre = $_POST['genre'];
            $query = $con->prepare("UPDATE `profil` SET `Genre_profil` = :genre WHERE `Id_profil` = $idProfil");
            $query->bindParam(':genre', $nouveauGenre);
            $query->execute();

            $success['genre'] = "true";
        }

        connexionSession($users['Id_profil'],$users['Mail_profil'], $users['Pseudo_profil'], $users['Genre_profil'], $users['Image_profil'], $users['#Id_role']);

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

    #Fonction pour modifier l'image de profil d'un utilisateur, retourne une erreur s'il y en a une, sinon vrai
    function editImage($idProfil) {
        $con = connexionBdd();
        $users = selectFromProfil($idProfil);

        $nomImage = $_FILES['image']['name'];
        $tmpNameImage = $_FILES['image']['tmp_name'];
        $sizeImage = $_FILES['image']['size'];
        $errorImage = $_FILES['image']['error'];
        $typeImage = $_FILES['image']['type'];

        $nomImageExt = explode('.', $nomImage);
        $nomImageExt = end($nomImageExt);
        $nomImageExt = strtolower($nomImageExt);
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if(in_array($nomImageExt, $allowed)) {
            if($errorImage === 0) {
                if($sizeImage < 10000000) {
                    $query = $con->prepare("SELECT `Image_profil` FROM `profil` WHERE `Id_profil` = $idProfil");
                    $query->execute();
                    $deleteImage = $query->fetch();
                    $defaultPicture = "./image_profil/Default.png";
                    if($deleteImage['Image_profil'] != $defaultPicture) {
                        unlink($deleteImage['Image_profil']);
                    }

                    $nomUpload = $users["Id_profil"].".".$nomImageExt;
                    $fileUpload = "./image_profil/".$nomUpload;
                    move_uploaded_file($tmpNameImage, $fileUpload);

                    $query = $con->prepare("UPDATE `profil` SET `Image_profil` = :newimage WHERE `Id_profil` = $idProfil");
                    $query->bindParam(':newimage', $fileUpload);
                    $query->execute();

                    if($_SESSION['utilisateur']['id'] == $users['Id_profil']) {
                        $users = selectFromProfil($idProfil);
                        $_SESSION['utilisateur']['image'] = $users['Image_profil'];
                    }

                    return true;
                }
                else {
                    return "La taille de votre image ne doit pas dépasser 10Mo!";
                }
            }
            else {
                return "Erreur lors de l'upload de l'image. Veuillez réessayer.";
            }
        }
        else {
            return "Type de fichier non pris en charge. Veuillez choisir un fichier d'extension .jpg, .jpeg, .png ou .gif.";
        }
    }

    #Fonction pour supprimer une image (et mettre celle de défaut), retourne vrai si la suppression a bien eu lieu, rien sinon
    function suppImage($idProfil) {
        $con = connexionBdd();
        $users = selectFromProfil($idProfil);
        $defaultPicture = "./image_profil/Default.png";
        $deleteSuccess = false;

        $query = $con->prepare("SELECT `Image_profil` FROM `profil` WHERE `Id_profil` = $idProfil");
        $query->execute();
        $checkDefault = $query->fetch();

        if($checkDefault['Image_profil'] != $defaultPicture) {
            $deleteSuccess = unlink($checkDefault['Image_profil']);

            $query = $con->prepare("UPDATE `profil` SET `Image_profil` = :newimage WHERE `Id_profil` = $idProfil");
            $query->bindParam(':newimage', $defaultPicture);
            $query->execute();

            if($_SESSION['utilisateur']['id'] == $users['Id_profil']) {
                $users = selectFromProfil($idProfil);
                $_SESSION['utilisateur']['image'] = $users['Image_profil'];
            }
        }

        return $deleteSuccess;
    }

    #Fonction pour savoir quelles questions ont été like par un utilisateur, retourne le tableau des questions
    function getLikeProfil($idProfil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `likes` WHERE `#Id_profil` = $idProfil");
        $query->execute();
        return $query->fetchAll();
    }

    #Fonction pour savoir si un utilisateur a like une question, retourne vrai ou faux
    function hasLiked($idProfil, $idQuestion) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `likes` WHERE `#Id_question` = $idQuestion AND `#Id_profil` = $idProfil");
        $query->execute();
        $result = $query->fetch();
        if(empty($result)) {
            return false;
        }
        else {
            return true;
        }
    }

    #Fonction pour savoir combien de likes une question a, retourne le nombre de like de la question
    function getLikeQuestion($idQuestion) {
        $con = connexionBdd();

        #count(*) GROUP BY
        $query = $con->prepare("SELECT count(`#Id_question`) as likecounter FROM `likes` WHERE `#Id_question` = $idQuestion");
        $query->execute();
        return $query->fetch();
    }

    function demandeAmiRecu($idProfil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `demande_ami` WHERE `#Id_profil` = $idProfil");
        $query->execute();
        $result = $query->fetchAll();

        if(empty($result)) {
            return false;
        }
        else {
            return $result;
        }
    }

    function getAmi($idProfil) {
        $con = connexionBdd();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` IN( SELECT CASE WHEN `#Id_profil` = $idProfil THEN `Id_profil` WHEN `Id_profil` = $idProfil THEN `#Id_profil` END FROM `ami` )");
        $query->execute();
        return $query->fetchAll();
    }
?>