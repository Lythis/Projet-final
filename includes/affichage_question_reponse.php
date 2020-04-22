<div>
    <div class="cardP w-50 mr-md-9 responsive-bootstrap-card m-card shadow-lg p-3 " id="questionpose<?php echo $idquestion ?>" >
        <form action="profil.php" method="get">
            <h5 class="card-header " id="reponse<?php echo $idquestion; ?>"><button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a posé la question :</h5>
        </form>
        <div class="card-body">
            <h5 class="card-title">Catégorie : <?php echo $categorie["0"]["Libelle_categorie"]; ?></h5>
            <p class="card-text"><?php echo $question[0]["Titre_question"]; ?></p>
            <blockquote class="blockquote mb-2">
                <p></p>
                <footer class="blockquote-footer">Le <?php echo $question[0]["Date_creation_question"]; ?></footer>
            </blockquote>

            <div style="display: flex";>

                <button class="btn bg-primary text-white toggle-btn" type="button" data-toggle="collapse" data-target="#repondre, #question<?php echo $idquestion; ?>" aria-expanded="false" aria-controls=" question<?php echo $idquestion; ?>">
                    <span class="afficher">Afficher les réponses (<?php echo $nombrereponses; ?>)</span>
                    <span class="masquer">Masquer les réponses</span>
                </button>
                <?php if($idprofil == $_SESSION['utilisateur']['id'] || $_SESSION['utilisateur']['role'] == 1) { ?>
                    <form action="./QuestionsReponses.php" method="get">
                        <button class="btn btn-danger ml-4" name="question" value="<?php echo $idquestion; ?>,supp">Supprimer la question</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="cardP w-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="repondre">
    <div class="card-body">
        <form class="needs-validation" method="post" action="./QuestionsReponses.php?question=<?php echo $questionstatus[0]; ?>">
            <div >
                <div class=" mb-3" >
                    <label for="validationCustom01">Répondre à la question :</label>
                    <textarea  placeholder='' type="text" class="form-control autoExpand w-100" id="validationCustom01" name="reponse" required></textarea>
                    <div class="invalid-feedback">
                        Veuillez saisir une réponse.
                    </div>
                </div>
            </div>
            <button type="submit" class="btn bg-primary text-white">Envoyer</button>
        </form>
    </div>

    <?php

    if (!empty($reponses)) {
        foreach ($reponses as $reponse) {
            $idreponse = $reponse["Id_reponse"];

            $users = selectFromProfilWithIdReponse($idquestion, $idreponse);
    ?>

</div>

<div class="cardP w-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="question<?php echo $idquestion; ?>">
    <div class="card-body">
        <div class="">
            <div class="card-header">
                <form action="profil.php" class="text-dark" method="get">
                    <button class="text-dark" name="profil" value="<?php echo $users[0]["Id_profil"]; ?>"><img class="picture-user-small" src="./image_profil/<?php echo $users[0]["Image_profil"]; ?>" alt="<?php echo $users[0]["Pseudo_profil"]; ?>"> <b><?php echo $users["0"]["Pseudo_profil"]; ?></button></b> a répondu :
                </form>
            </div>
            <div class="card-body">
                <?php echo $reponse["Contenu_reponse"]; ?>
                <blockquote class="blockquote mb-0">

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
        echo '<div class="ml-4">Wow, such empty.</div>';
    }
?>

</div>