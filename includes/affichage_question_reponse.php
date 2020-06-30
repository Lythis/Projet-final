<body class="bgP">
    <div>
        <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="cardP w-md-50 mr-md-9 responsive-bootstrap-card m-card shadow-lg p-3 " id="questionpose<?php echo $idQuestion ?>" >
            <h5 <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } else { ?> style="background-color: white;" <?php } ?> class=" card-header border-0" id="reponse<?php echo $idQuestion; ?>"><a class="text-dark float-sm-left float-right mr-md-5" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <p> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a posé la question <?php if($question["Type"] == 1) { ?> à ses amis <?php } ?> :</h5></p>
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
                        <button type="submit" class="btn bg-primary text-white ml-4"  data-toggle="modal" data-target="#modifCAteg">Modifier la catégorie</button>
                        <form action="./QuestionsReponses.php" method="get">
                            <button class="btn btn-danger ml-4" name="question" value="<?php echo $idQuestion; ?>,supp">Supprimer la question</button>
                        </form>                      
                        <?php } ?>
                        <div class="heart">
                    <?php
                    $nombreLikes = getLikeQuestion($idQuestion);

                    $hasLiked = hasLiked($_SESSION["utilisateur"]["id"], $idQuestion);
                        if($hasLiked == true) {
                            ?>
                            <button class="liked1 press-button" name="liked" id="<?php echo $idQuestion ?>, <?php echo $_SESSION['utilisateur']['id']; ?>">
                                <i class="fas fa-heart heart1"> </i>
                            </button>
                            <?php
                        }
                        else {
                            ?>
                            <button class="notliked1 press-button" name="notliked"  id="<?php echo $idQuestion ?>, <?php echo $_SESSION['utilisateur']['id']; ?>">
                                <i class="far fa-heart heart2"></i>
                            </button>
                            
                            <?php
                        }
                    ?>
                    <div id="reload"> <p> <?php echo $nombreLikes["likecounter"]; ?></p></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modifCAteg" tabindex="-1" role="dialog" aria-labelledby="modifCAtegLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifCAtegLabel">Changer la catégorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="validationTooltip01">Catégorie actuelle :</label>
                        
                            <p value=""><?php echo $categorie["Libelle_categorie"]; ?></p>
                             
                        
                        <label for="validationTooltip01">Nouvelle categorie</label>
                    <form action="" method="POST">
                    <select class="custom-select mb-2" id="validationTooltip02" placeholder="Categorie" name="remplaceCateg" required>
                        <option value="">Selectionner une catégorie</option>
                                <?php
                                    $categ = selectAllCategories("DESC");
                                    foreach($categ as $categorie){
                                ?>
                                 <option value="<?php echo $categorie['Id_categorie'];?>"><?php echo $categorie['Libelle_categorie']; ?> </option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>
                
                <div class="modal-footer">
                    <button type="submit" value="" class="btn btn-primary">Changer la catégorie</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="cardP w-md-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="repondre">
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
                    <button type="submit" class="btn bg-primary text-white">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
            <?php
            
            if (!empty($reponses)) {
                foreach ($reponses as $reponse) {
                    $idReponse = $reponse["Id_reponse"];
                    
                    $users = selectFromProfilWithidReponse($idQuestion, $idReponse);
                    ?>
                
                <div <?php if($question["Type"] == 1) { ?> style="background-color: #ECDCEC;" <?php } ?> class="cardP w-md-50 responsive-bootstrap-card shadow-lg p-3 mt-2 collapse "  id="question<?php echo $idQuestion; ?>">
                    <div class="card-body">
                        <div>
                            <h5><a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><img class="picture-user-small" src="<?php echo $users["Image_profil"]; ?>" alt="<?php echo $users["Pseudo_profil"]; ?>"></a> <a class="text-dark" name="profil" href="./profil.php?profil=<?php echo $users["Id_profil"]; ?>"><b><?php echo $users["Pseudo_profil"]; ?></a></b> a répondu :</h5>
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
    