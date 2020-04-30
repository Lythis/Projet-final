<body class="bgP">
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
        <div class="carde5  m-card shadow-lg p-3  id="questionpose<?php echo $idquestion ?>">
            <h5  id="reponse<?php echo $idquestion; ?>"><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small " src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a posé la question :</h5>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie["Libelle_categorie"]; ?></h5>
                <span><?php echo $question["Titre_question"]; ?></span>
                
                <blockquote class="blockquote mb-2">
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
                            
                            <h5 class="card-header "><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a répondu :</h5>
                            
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
            ?>
            
            <div class="card responsive-bootstrap-card collapse shadow-lg p-3 mb-5" id="question<?php echo $idquestion; ?>">
                <p>Wow, such empty.</p>
            </div>
            
            <?php
        }
    }
    ?>