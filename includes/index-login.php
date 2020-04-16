    <h3 class="d-flex justify-content-center">Envie de poser une question? Venez la poser&nbsp;<a href="./Questions.php">ici</a>!</h3>

    <?php
        $query = $con->prepare("SELECT * FROM question ORDER BY `Date_creation_question` DESC");
        $query->execute();
        $questions = $query->fetchAll();

        foreach ($questions as $question) {

            $idquestion = $question["Id_question"];
            $idprofil = $question["#Id_profil"];
            $idcategorie = $question["#Id_categorie"];

            $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = ( SELECT `Id_question` FROM `question` WHERE `Id_question` = $idquestion) ORDER BY `Date_reponse` DESC");
            $query->execute();
            $reponses = $query->fetchAll();

            $query = $con->prepare("SELECT * FROM `profil` WHERE `Id_profil` = ( SELECT `#Id_profil` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_profil` = $idprofil )");
            $query->execute();
            $users = $query->fetchAll();

            $query = $con->prepare("SELECT * FROM `categorie` WHERE `Id_categorie` = ( SELECT `#Id_categorie` FROM `question` WHERE `Id_question` = $idquestion AND `#Id_categorie` = $idcategorie )");
            $query->execute();
            $categorie = $query->fetchAll();

            $nombrereponses = 0;
            if(!empty($reponses)) {
                for ($ind=0; $ind < count($reponses); $ind++) { 
                    $nombrereponses = $nombrereponses + 1;
                }
            }
    ?>
        <div class="carde5 responsive-bootstrap-card m-card shadow-lg p-3 mb-5" id="questionpose<?php echo $idquestion ?>">
            <form action="profil.php" method="get">
                <h5 class="card-header" id="reponse<?php echo $idquestion; ?>"><button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a posé la question :</h5>
            </form>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie["0"]["Libelle_categorie"]; ?></h5>
                <p class=""><?php echo $question["Titre_question"]; ?></p>
                <form action="./QuestionsReponses.php" method="get">
                    <button name="question" value="<?php echo $idquestion ?>">Accéder à la question</button>
                </form>
                <blockquote class="blockquote mb-2">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question["Date_creation_question"]; ?></footer>
                </blockquote>

                <button class="pBtn btn-primary toggle-btn" type="button" data-toggle="collapse" data-target="#question<?php echo $idquestion; ?>" aria-expanded="false" aria-controls="question<?php echo $idquestion; ?>">
                    <span class="afficher">Afficher les réponses (<?php echo $nombrereponses; ?>)</span>

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
                <div class="card responsive-bootstrap-card collapse " id="question<?php echo $idquestion; ?>">
                    <div class="card-body">
                        <div class="text-dark">
                            <div class="card-header">
                                <form action="profil.php" method="get">
                                    <button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a répondu :
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
    ?>

    <?php
        require_once('includes/footer.php');
    ?>