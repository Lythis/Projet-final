<h3 class="d-flex justify-content-center">Envie de poser une question? Venez la poser&nbsp;<a href="./Questions.php">ici</a>!</h3>

<?php
    $questions = selectAllQuestions("DESC");

    foreach ($questions as $question) {

        $idquestion = $question["Id_question"];
        $idprofil = $question["#Id_profil"];
        $idcategorie = $question["#Id_categorie"];

        $reponses = selectFromReponseWithIdQuestion($idquestion, "DESC");

        $users = selectFromProfilWithIdQuestion($idquestion, $idprofil);

        $categorie = selectFromCategorieWithIdQuestion($idquestion, $idcategorie);

        $nombrereponses = getNombreReponses($reponses);
?>
    <div class="carde5 responsive-bootstrap-card m-card shadow-lg p-3 mb-5" id="questionpose<?php echo $idquestion ?>">
        <h5 class="card-header" id="reponse<?php echo $idquestion; ?>"><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users[0]["Id_profil"]; ?>"><b><?php echo $users["0"]["Pseudo_profil"]; ?></a></b> a posé la question :</h5>
        <div class="card-body">
            <h5 class="card-title">Catégorie : <?php echo $categorie["0"]["Libelle_categorie"]; ?></h5>
            <p class=""><?php echo $question["Titre_question"]; ?></p>
            
            <blockquote class="blockquote mb-2">
                <p></p>
                <footer class="blockquote-footer">Le <?php echo $question["Date_creation_question"]; ?></footer>
            </blockquote>

            
            <form action="./QuestionsReponses.php" method="get">
                <button class="pBtn" name="question" value="<?php echo $idquestion ?>">Accéder à la question</button>
            </form>
            <button class="pBtn toggle-btn mt-3" type="button" data-toggle="collapse" data-target="#question<?php echo $idquestion; ?>" aria-expanded="false" aria-controls="question<?php echo $idquestion; ?>">
                <span class="afficher">Afficher les réponses (<?php echo $nombrereponses; ?>)</span>

                <span class="masquer">Masquer les réponses</span>
            </button>
        </div>
    </div>

    <?php
        if (!empty($reponses)) {
            foreach ($reponses as $reponse) {
                $idreponse = $reponse["Id_reponse"];

                $users = selectFromProfilWithIdReponse($idquestion, $idreponse);
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

    <div class="card responsive-bootstrap-card collapse shadow-lg p-3 mb-5" id="question<?php echo $idquestion; ?>">
        <p>Wow, such empty.</p>
    </div>

<?php
        }
    }
?>

<?php
    require_once('includes/footer.php');
?>