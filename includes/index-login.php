    <?php
        $query = $con->prepare("SELECT * FROM question");
        $query->execute();
        $questions = $query->fetchAll();

        $query = $con->prepare("SELECT * FROM reponse");
        $query->execute();
        $reponses = $query->fetchAll();

        foreach ($questions as $question) {

    ?>

        <div class="card responsive-bootstrap-card mx-auto">
            <h5 class="card-header"><img class="picture-user-small" src="profile-picture/lythis.jpg" alt=""> <b></b> a posé la question :</h5>
            <div class="card-body">
                <h5 class="card-title">Catégorie :</h5>
                <p class="card-text"><?php echo $question['Titre_question']; ?></p>
                <blockquote class="blockquote mb-0">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question['Date_creation_question']; ?></footer>
                </blockquote>
                <?php
                    if (!empty($reponses)) {
                ?>
                <a class="btn btn-primary toggle-btn">Afficher les réponses</a>
                <?php
                    }
                ?>
            </div>
        </div>

        <?php
            if (!empty($reponses)) {
                foreach ($reponses as $reponse) {
        ?>
                <div class="card hidden-answer responsive-bootstrap-card mx-auto">
                    <div class="card-body">
                        <div class="card mb-2">
                            <div class="card-header">
                                <img class="picture-user-small" src="profile-picture/leo.jpg" alt=""> <b></b> a répondu :
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
        }
    ?>

    <div class="bas-page">
    <?php
        require_once('includes/footer.php');
    ?>
    </div>