    <?php
        $query = $con->prepare("SELECT * FROM question");
        $query->execute();
        $questions = $query->fetchAll();

        $query = $con->prepare("SELECT * FROM profil");
        $query->execute();
        $users = $query->fetchAll();

        $query = $con->prepare("SELECT * FROM categorie");
        $query->execute();
        $categorie = $query->fetchAll();

        foreach ($questions as $question) {

            $reponsequestion = $question['Id_question'];

            $query = $con->prepare("SELECT * FROM `reponse` WHERE `#Id_question` = $reponsequestion");
            $query->execute();
            $reponses = $query->fetchAll();

            $categoriequestion = $question["#Id_categorie"] - 1;
            $userquestion = $question["#Id_profil"] - 1;
    ?>
        <div class="card responsive-bootstrap-card m-card" id="questionpose<?php echo $reponsequestion; ?>">
            <h5 class="card-header" id="reponse<?php echo $reponsequestion; ?>"><img class="picture-user-small" src="profile-picture/lythis.jpg" alt=""> <b><?php echo $users[$userquestion]['Pseudo_profil']; ?></b> a posé la question :</h5>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie[$categoriequestion]['Libelle_categorie']; ?></h5>
                <p class="card-text"><?php echo $question['Titre_question']; ?></p>
                <blockquote class="blockquote mb-2">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question['Date_creation_question']; ?></footer>
                </blockquote>
                <button class="btn btn-primary toggle-btn" type="button" data-toggle="collapse" data-target="#question<?php echo $reponsequestion; ?>" aria-expanded="false" aria-controls="question<?php echo $reponsequestion; ?>">
                    <span class="afficher">Afficher les réponses</span>
                    <span class="masquer">Masquer les réponses</span>
                </button>
            </div>
        </div>

        <?php
            if (!empty($reponses)) {
                foreach ($reponses as $reponse) {

                    $userreponse = $reponse["#Id_profil"] - 1;
        ?>
                <div class="card responsive-bootstrap-card collapse" id="question<?php echo $reponsequestion; ?>">
                    <div class="card-body">
                        <div class="">
                            <div class="card-header">
                                <img class="picture-user-small" src="profile-picture/leo.jpg" alt=""> <b><?php echo $users[$userreponse]['Pseudo_profil']; ?></b> a répondu :
                            </div>
                            <div class="card-body">
                                <?php echo $reponse['Contenu_reponse']; ?>
                                <blockquote class="blockquote mb-0">
                                    <p></p>
                                    <footer class="blockquote-footer">Le <?php echo $reponse['Date_reponse']; ?></footer>
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

        <div class="card responsive-bootstrap-card collapse" id="question<?php echo $reponsequestion; ?>">
            <p>Wow, such empty.</p>
        </div>

    <?php
            }
        }
    ?>

    <?php
        require_once('includes/footer.php');
    ?>