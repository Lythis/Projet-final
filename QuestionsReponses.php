<?php
    require_once('db/base_PDO.php');

    $getthequestion = $_GET['question'];
    $query = $con->prepare("SELECT * FROM question WHERE `Id_question` = $getthequestion");
    $query->execute();
    $question = $query->fetchAll();

    if(!empty($_GET['question']) && !empty($question)) {

        $idquestion = $question[0]["Id_question"];
        $idprofil = $question[0]["#Id_profil"];
        $idcategorie = $question[0]["#Id_categorie"];

        $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idquestion) ORDER BY `Date_reponse`");
        $query->execute();
        $reponses = $query->fetchAll();

        $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_profil` = $idprofil )");
        $query->execute();
        $users = $query->fetchAll();

        $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_categorie` = $idcategorie )");
        $query->execute();
        $categorie = $query->fetchAll();

        $title ='Question de '.$users[0]["Pseudo_profil"];
        require_once('includes/header.php');
    
?>
<body>
    <?php 
        require_once('./includes/nav-bar.php');
    ?>
    <div class="card responsive-bootstrap-card m-card" id="questionpose<?php echo $idquestion ?>">
            <form action="profil.php" method="get">
                <h5 class="card-header" id="reponse<?php echo $idquestion; ?>"><button name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a posé la question :</h5>
            </form>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie["0"]["Libelle_categorie"]; ?></h5>
                <p class="card-text"><?php echo $question[0]["Titre_question"]; ?></p>
                <blockquote class="blockquote mb-2">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question[0]["Date_creation_question"]; ?></footer>
                </blockquote>
                <button class="btn btn-primary toggle-btn" type="button" data-toggle="collapse" data-target="#question<?php echo $idquestion; ?>" aria-expanded="false" aria-controls="question<?php echo $idquestion; ?>">
                    <span class="afficher">Afficher les réponses</span>
                    <span class="masquer">Masquer les réponses</span>
                </button>
            </div>
        </div>

        <?php
            if (!empty($reponses)) {
                foreach ($reponses as $reponse) {

                    $unereponse = $reponse["Id_reponse"];

                    $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `reponse` WHERE `#Id_question` = $idquestion AND `Id_reponse` = $unereponse)");
                    $query->execute();
                    $users = $query->fetchAll();

        ?>
            <div class="card responsive-bootstrap-card collapse" id="question<?php echo $idquestion; ?>">
                <div class="card-body">
                    <div class="">
                        <div class="card-header">
                            <form action="profil.php" method="get">
                                <button name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a répondu :
                            </form>
                        </div>
                        <div class="card-body">
                            <?php echo $reponse["Contenu_reponse"]; ?>
                            <blockquote class="blockquote mb-0">
                                <p></p>
                                <footer class="blockquote-footer">Le <?php echo $reponse["Date_reponse"]; ?></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

    <?php
            }
        }
        else {
    ?>

        <div class="card responsive-bootstrap-card collapse" id="question<?php echo $idquestion; ?>">
            <p>Wow, such empty.</p>
        </div>

    <?php
        }
    }
    else {
        $title = 'Question Invalide';
        require_once('includes/header.php');
        require_once('includes/nav-bar.php');
        echo 'Question introuvable. <a href="./index.php">Revenir aux questions</a>.';
    }
    ?>
        <div class="bas-page">
    <?php
        require_once('includes/footer.php');
    ?>
    </div>