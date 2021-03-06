<body class="bgP">
    <div class=" justify-content-center">
        <h3 class="d-md-flex justify-content-center">Envie de poser une question? Venez la poser&nbsp;<a href="./Questions.php">ici</a>!</h3>
    </div>
    <div style="display: flex;">
        <form class="forme" action="./index.php" method="post">
            <select class="listDeTri" name="triage" >
                <option <?php if(!isset($_COOKIE["triage"])) { echo "selected"; } ?> value="null">Aucun triage</option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "likeA") { echo "selected"; } ?> value="likeA">Nombre de likes - Ascendants</i></option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "likeD") { echo "selected"; } ?> value="likeD">Nombre de likes - Descendants</i></option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "dateA") { echo "selected"; } ?> value="dateA">Date - Ascendantes</i></option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "dateD") { echo "selected"; } ?> value="dateD">Date - Descendantes</i></option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "reponseA") { echo "selected"; } ?> value="reponseA">Nombre de réponses - Ascendantes</i></option>
                <option <?php if(isset($_COOKIE["triage"]) && $_COOKIE["triage"] == "reponseD") { echo "selected"; } ?> value="reponseD">Nombre de réponses - Descendantes</i></option>
            </select>
            <select class="listDeTri list2" name="triagea" >
                <option <?php if(!isset($_COOKIE["triagea"])) { echo "selected"; } ?> class="defaut" value="null">Pas de triage avancé</option>
                <option <?php if(isset($_COOKIE["triagea"]) && $_COOKIE["triagea"] == "categorie") { echo "selected"; } ?> value="categorie">Sélectionner une catégorie</i></option>
                <option <?php if(isset($_COOKIE["triagea"]) && $_COOKIE["triagea"] == "qamis") { echo "selected"; } ?> value="qamis">Questions posées par mes amis</i></option>
            </select>
            <select class="listDeTri categ" placeholder="Categorie" name="categorie">
                <option <?php if(!isset($_COOKIE["categorie"])) { echo "selected"; } ?> value="null">Selectionner une catégorie</option>
                <?php
                    $categ = selectAllCategories("DESC");
                    foreach($categ as $categorie){
                ?>
                    <option <?php if(isset($_COOKIE["categorie"]) && $_COOKIE["categorie"] == $categorie['Id_categorie']) { echo "selected"; } ?> value="<?php echo $categorie['Id_categorie']; ?>"><?php echo $categorie['Libelle_categorie']; ?> </option>
                <?php
                    }
                ?>
            </select>
            
            <button type="submit" class="pBtn" style="width: 10%;" name="validerTriage" value="valide">Trier</button>
            <button type="reset" class="pBtn reset" style="width: 14%;" name="reset" value="reset">Réinitialiser le triage avancé</button>
        </form>
    </div>
    <div id="scrollUp">
        <a href="#top"><img src="image/to_top.png"/></a>
    </div>
    <div id="scrollDown">
        <a href="#center-pages"><img src="image/to_top.png"/></a>
    </div>
    <?php
    // Affichage de toutes les questions en fonction de la page sur laquelle l'utilisateur se trouve
    if (empty($_GET['page'])) {
        $_GET["page"] = 1;
    }
    // Nombre de questions par page (ici 30)
    $pageCounter = selectAllQuestions(null);
    $pageCounter = ceil(count($pageCounter) / 30);
    
    $questions = selectAllQuestions(30);

    if (!empty($questions)) {
    
        foreach ($questions as $question) {
            
            $idQuestion = $question["Id_question"];
            $idProfilUser = $question["#Id_profil"];
            $idCategorie = $question["#Id_categorie"];
            
            $reponses = selectFromReponseWithidQuestion($idQuestion, "DESC");
            
            $users = selectFromProfilWithidQuestion($idQuestion, $idProfilUser);
            
            $categorie = selectFromCategorieWithidQuestion($idQuestion, $idCategorie);
            
            $nombreReponses = getnombreReponses($reponses);

            $nombreLikes = getLikeQuestion($idQuestion);

            $hasLiked = hasLiked($_SESSION["utilisateur"]["id"], $idQuestion);
            ?>

            <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="carde5 responsive-bootstrap-card m-card shadow-lg p-3 mb-5" id="questionpose<?php echo $idQuestion ?>">
                <h5  id="reponse<?php echo $idQuestion; ?>"><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small " src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a posé la question <?php if($question["Type"] == 1) { ?> à ses amis <?php } ?> :</h5>
                <div class="card-body">
                    <h5 class="card-title">Catégorie : <?php echo $categorie["Libelle_categorie"]; ?></h5>
                    <span><?php echo $question["Titre_question"]; ?></span>
                    <div class="heart">
                    <?php
                        if($hasLiked == true) {
                            ?>
                            <button <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="liked1 press-button" name="liked" id="<?php echo $idQuestion ?>, <?php echo $_SESSION['utilisateur']['id']; ?>">
                                <i class="fas fa-heart heart1"> </i>
                            </button>
                            <?php
                        }
                        else {
                            ?>
                            <button <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="notliked1 press-button" name="notliked" id="<?php echo $idQuestion ?>, <?php echo $_SESSION['utilisateur']['id']; ?>">
                                <i class="far fa-heart heart2"></i>
                            </button>
                            
                            <?php
                        }
                    ?>
                     <span class="likecounter"> <?php echo $nombreLikes["likecounter"] ; ?></span>
                    </div>
                    
                    <blockquote class="blockquote mb-2">
                        
                       <footer class="blockquote-footer">Le <?php echo $question["Date_creation_question"]?>  </footer>
                     
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
                    <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="cardR mb-5 responsive-bootstrap-card collapse " id="question<?php echo $idQuestion; ?>">
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
                
                <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="cardR responsive-bootstrap-card collapse shadow-lg p-3 mb-5" id="question<?php echo $idQuestion; ?>">
                    <p>Wow, such empty.</p>
                </div>
                
                <?php
            }
        }
        ?>
        <!-- Compteur de page -->
        <div class="center-pages" id="center-pages">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
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