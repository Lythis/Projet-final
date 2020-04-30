<body class="bgP">
    <div>
        <div class="cardP w-md-50 mr-md-9 responsive-bootstrap-card m-card shadow-lg p-3 " id="questionpose<?php echo $idQuestion ?>" >
            <h5 class=" card-header bg-white border-0" id="reponse<?php echo $idQuestion; ?>"><a class="text-dark float-right" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <p> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a posé la question :</h5></p>
            <div class="card-body">
                <h5 class="card-title">Catégorie : <?php echo $categorie["Libelle_categorie"]; ?></h5>
                <p class="card-text"><?php echo $question["Titre_question"]; ?></p>
                <blockquote class="blockquote mb-2">
                    <p></p>
                    <footer class="blockquote-footer">Le <?php echo $question["Date_creation_question"]; ?></footer>
                </blockquote>
                
                <div style="display: flex";>
                    
                    <button class="btn bg-primary text-white toggle-btn" type="button" data-toggle="collapse" data-target="#repondre, #question<?php echo $idQuestion; ?>" aria-expanded="false" aria-controls=" question<?php echo $idQuestion; ?>">
                        <span class="afficher">Afficher les réponses (<?php echo $nombreReponses; ?>)</span>
                        <span class="masquer">Masquer les réponses</span>
                    </button>
                    <?php if($idProfil == $_SESSION['utilisateur']['id'] || $_SESSION['utilisateur']['role'] == 1) { ?>
                        <form action="./QuestionsReponses.php" method="get">
                            <button class="btn btn-danger ml-4" name="question" value="<?php echo $idQuestion; ?>,supp">Supprimer la question</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="cardP w-md-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="repondre">
            <div class="card-body">
                <form class="needs-validation" method="post" action="./QuestionsReponses.php?question=<?php echo $questionStatus[0]; ?>">
                    <div >
                        <div class=" mb-3" >
                            <label for="validationCustom01">Répondre à la question :</label>
                            <textarea  placeholder='' type="text" class="form-control autoExpand w-100 h50" id="validationCustom01" maxlength="250" name="reponse" required></textarea>
                            <p style="text-align:right" id="compteur">0 mots | 0 Caractere / 250</p>
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
                    $idReponse = $reponse["Id_reponse"];
                    
                    $users = selectFromProfilWithidReponse($idQuestion, $idReponse);
                    ?>
                    
                </div>
                
                <div class="cardP w-md-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="question<?php echo $idQuestion; ?>">
                    <div class="card-body">
                        <div>
                            
                            <h5 class="card-header "><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a répondu :</h5>
                        </div>
                        <div class="card-body">
                            <?php echo $reponse["Contenu_reponse"]; ?>
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer">Le <?php echo $reponse["Date_reponse"]; ?></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                
                <?php
            }
        }
        else { ?>
        </div>
            <div class="cardP w-md-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse text-center" id="question<?php echo $idquestion; ?>">
                <p class="card-body">Il n'y a pas de réponses pour l'instant.</p>
            </div>
       <?php }
        ?>
        
    </div>
    