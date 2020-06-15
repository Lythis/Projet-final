<body class="bgP">
    <div class=" justify-content-center">
        <h3 class="d-md-flex justify-content-center">Envie de poser une question? Venez la poser&nbsp;<a href="./Questions.php">ici</a>!</h3>
    </div>
    
    
    <?php
    // Affichage de toutes les questions en fonction de la page sur laquelle l'utilisateur se trouve
    if (empty($_GET['page'])) {
        $_GET["page"] = 1;
    }
    $ind = 1;
    // Nombre de questions par page (ici 30)
    $limit = $_GET['page'] * 30;
    $pageCounter = selectAllQuestions("DESC", null, 0);
    $pageCounter = ceil(count($pageCounter) / 30);
    $questions = selectAllQuestions("DESC", $limit, ($limit - 30));

    // <i class="far fa-heart"></i>
    // <i class="fas fa-heart"></i>

    if (!empty($questions)) {
    
        foreach ($questions as $question) {
            
            $idQuestion = $question["Id_question"];
            $idProfil = $question["#Id_profil"];
            $idCategorie = $question["#Id_categorie"];
            
            $reponses = selectFromReponseWithidQuestion($idQuestion, "DESC");
            
            $users = selectFromProfilWithidQuestion($idQuestion, $idProfil);
            
            $categorie = selectFromCategorieWithidQuestion($idQuestion, $idCategorie);
            
            $nombreReponses = getnombreReponses($reponses);
            ?>

            <div class="carde5 responsive-bootstrap-card m-card shadow-lg p-3 mb-5" id="questionpose<?php echo $idQuestion ?>">
                <h5  id="reponse<?php echo $idQuestion; ?>"><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small " src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a posé la question :</h5>
                <div class="card-body">
                    <h5 class="card-title">Catégorie : <?php echo $categorie["Libelle_categorie"]; ?></h5>
                    <span><?php echo $question["Titre_question"]; ?></span>
                    
                    <blockquote class="blockquote mb-2">
                        <footer class="blockquote-footer">Le <?php echo $question["Date_creation_question"]." Nombre de like : ".getLikeQuestion($idQuestion); ?></footer>
                    </blockquote>
                    
                    
                    <form action="./QuestionsReponses.php" method="get">
                        <button class="pBtn" name="question" value="<?php echo $idQuestion ?>">Accéder à la question</button>
                    </form>
                    <button class="pBtn toggle-btn mt-3" type="button" data-toggle="collapse" data-target="#question<?php echo $idQuestion; ?>" aria-expanded="false" aria-controls="question<?php echo $idQuestion; ?>">
                        <span class="afficher">Afficher les réponses (<?php echo $nombreReponses; ?>)</span>
                    
                        <span class="masquer">Masquer les réponses</span>
                    </button>
                </div>
            </div>
            
            <?php
            // Affichage de toutes les réponses (si il y en a)
            if (!empty($reponses)) {
                foreach ($reponses as $reponse) {
                    $idReponse = $reponse["Id_reponse"];
                    
                    $users = selectFromProfilWithidReponse($idQuestion, $idReponse);
                    ?>
                    <div class="cardR mb-5 responsive-bootstrap-card collapse " id="question<?php echo $idQuestion; ?>">
                        <div class="card-body">
                            <div class="text-dark">
                                
                                <h5><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a répondu :</h5>
                                
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
                
                <div class="cardR responsive-bootstrap-card collapse shadow-lg p-3 mb-5" id="question<?php echo $idQuestion; ?>">
                    <p>Wow, such empty.</p>
                </div>
                
                <?php
            }
        }
        ?>
        <!-- Compteur de page -->
        <div class="center-pages ">
            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center">
                <li id="retirer" class="page-item border border-secondary">
                        <?php
                        if ($_GET['page'] ==1){
                            ?>
                            <li id="retirer" class="page-item disabled border border-secondary">
                            
                        <?php
                        }else{
                          ?>
                          <li id="retirer" class="page-item border border-secondary">
                          <?php  
                        }
                        ?>  
                    <a class="page-link text-dark" href="../index.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>
                    <?php
                        if ($_GET['page'] != 1)
                        {
                            ?>
                            <li class="page-item border border-secondary"><a class="page-link text-dark" href="../index.php?page=<?php echo $_GET['page'] - 1; ?>"><?php echo $_GET['page'] - 1; ?></a></li>
                            <?php
                        }
                    ?>
                    <li class="page-item border border-secondary"><a class="page-link text-dark" href="../index.php?page=<?php echo $_GET['page']; ?>"><b><?php echo $_GET['page']; ?></b></a></li>
                    <?php
                        if ($_GET['page'] != $pageCounter)
                        {
                            ?>
                            <li class="page-item border border-secondary"><a class="page-link text-dark" href="../index.php?page=<?php echo $_GET['page'] + 1; ?>"><?php echo $_GET['page'] + 1; ?></a></li>
                            <?php
                        }
                    ?>
                    <li class="page-item border border-secondary">
                    <a class="page-link text-dark" href="../index.php?page=<?php echo $pageCounter; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php
    }
    else {
        ?>
        <div class=" justify-content-center">
            <h3 class="d-md-flex justify-content-center">Page introuvable!</h3>
        </div>
        <?php
    }
    ?>