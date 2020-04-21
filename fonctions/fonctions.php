<?php
    require_once('db/base_PDO.php');

    function estConnecte($session) {
        if(!empty($session)) {
            return true;
        }
        else {
            return false;
        }
    }

    function selectFromQuestion($idquestion) {
        $con = connexionBdd();
        $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $idquestion");
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

    function insertIntoReponse($reponse, $utilisateur, $question) {
        $con = connexionBdd();

        $obtenirdate = getdate();
        $date = $obtenirdate['year']."-".$obtenirdate['mon']."-".$obtenirdate['mday'];
            
        $query = $con->prepare('INSERT INTO `reponse`(`Contenu_reponse`, `Date_reponse`, `#Id_profil`, `#Id_question`) VALUES (:reponse, :dateajd, :id_user, :id_question)');
        $query->bindParam(':reponse', $reponse);
        $query->bindParam(':dateajd', $date);
        $query->bindParam(':id_user', $utilisateur);
        $query->bindParam(':id_question', $question);
        $query->execute();
    }
?>