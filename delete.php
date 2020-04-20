<?php
    require_once('db/base_PDO.php');
    $dontstartsession = true;
    session_start();

    if(!empty($_SESSION['utilisateur'])) {
        if(isset($_POST['profil'])) {
            $todelete = $_POST['profil'];
            $title = 'Supprimer le profil'.$todelete;

            if($_SESSION['utilisateur']['id'] == $todelete || $_SESSION['utilisateur']['role'] == 1) {
                $query = $con->prepare('DELETE FROM `reponse` WHERE `reponse`.`#Id_profil` = :id');
                $query->bindParam(':id', $todelete);
                $query->execute();

                $query = $con->prepare('DELETE FROM `question` WHERE `question`.`#Id_profil` = :id');
                $query->bindParam(':id', $todelete);
                $query->execute();

                $query = $con->prepare('DELETE FROM `profil` WHERE `profil`.`Id_profil` = :id');
                $query->bindParam(':id', $todelete);
                $query->execute();

                $success = true;

                if($_SESSION['utilisateur']['id'] == $todelete) {
                    session_unset();
		            session_destroy();
                }
            }
        }

        elseif(isset($_POST['question'])) {
            $todelete = $_POST['question'];
            $title = 'Supprimer la question '.$todelete;

            $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $todelete");
            $query->execute();
            $userquestion = $query->fetchAll();

            if($_SESSION['utilisateur']['id'] == $userquestion[0]['#Id_profil'] || $_SESSION['utilisateur']['role'] == 1) {
                $query = $con->prepare('DELETE FROM `question` WHERE `Id_question` = :id');
                $query->bindParam(':id', $todelete);
                $query->execute();

                $query = $con->prepare('DELETE FROM `reponse` WHERE `#Id_question` = :id');
                $query->bindParam(':id', $todelete);
                $query->execute();

                $success = true;
            }
        }
    }

    require_once('includes/header.php');

    if (!empty($_SESSION)) {
        require_once('./includes/nav-bar-login.php');
    }
    else {
        require_once('./includes/nav-bar.php');
    }

    if(isset($todelete) && $success == true) {
?>

<div class="card d-flex">
                        <div class="card-body ">
                            <img src="image/sad2.gif" class="card-img-top w-50" alt="triste">
                            <p class="card-text float-right pl-3 w-50">Suppression réussi. <a href="index.php">Revenir à l'accueil</a>.</p>
                        </div>
                    </div>


<?php
    }
    else {
?>
<div class="pCard">
                <div class="card-body" style="display: flex;">
                <p class="card-text"> <img src="image/tenor.gif" style="  width: 75%;
                margin-right: 6%;" class="" alt="facher">
                <p>Accès refusé. <a href="index.php">Revenir à l'accueil</a>.</p>
                </div>
              </div>


<?php
    }

?>